<?php declare(strict_types=1);

namespace FileEye\MimeMap;

use FileEye\MimeMap\Map\EmptyMap;
use FileEye\MimeMap\Map\MimeMapInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Compiles the MIME type to file extension map.
 */
class MapUpdater
{
    /**
     * The default, empty, base map to use for update.
     */
    const DEFAULT_BASE_MAP_CLASS = EmptyMap::class;

    /**
     * The map object to update.
     *
     * @var MimeMapInterface
     */
    protected $map;

    /**
     * Returns the default file with override commands to be executed.
     *
     * The YAML file provides an array of calls to MapHandler methods to be
     * executed sequentially. Each entry indicates the method to be invoked and
     * the arguments to be passed in.
     *
     * @return string
     */
    public static function getDefaultMapBuildFile(): string
    {
        return __DIR__ . '/../resources/default_map_build.yml';
    }

    /**
     * Returns the map object being updated.
     *
     * @return MimeMapInterface
     */
    public function getMap(): MimeMapInterface
    {
        return $this->map;
    }

    /**
     * Sets the map object to update.
     *
     * @param string $map_class
     *   The FQCN of the map to be updated.
     *
     * @return $this
     */
    public function selectBaseMap(string $map_class): MapUpdater
    {
        $this->map = MapHandler::map($map_class);
        $this->map->backup();
        return $this;
    }

    /**
     * Loads a new type-to-extension map reading from a file in Apache format.
     *
     * @param string $source_file
     *   The source file. The file must conform to the format in the Apache
     *   source code repository file where MIME types and file extensions are
     *   associated.
     *
     * @return string[]
     *   An array of error messages.
     *
     * @throws \RuntimeException
     *   If it was not possible to access the file.
     */
    public function loadMapFromApacheFile(string $source_file): array
    {
        $errors = [];

        $lines = @file($source_file);
        if ($lines == false) {
            $errors[] = "Failed accessing {$source_file}";
            return $errors;
        }
        $i = 1;
        foreach ($lines as $line) {
            if ($line[0] == '#') {
                $i++;
                continue;
            }
            $line = preg_replace("#\\s+#", ' ', trim($line));
            if (is_string($line)) {
                $parts = explode(' ', $line);
                $type = array_shift($parts);
                foreach ($parts as $extension) {
                    $this->map->addTypeExtensionMapping($type, $extension);
                }
            } else {
                $errors[] = "Error processing line $i";
            }
            $i++;
        }
        $this->map->sort();

        return $errors;
    }

    /**
     * Loads a new type-to-extension map reading from a Freedesktop.org file.
     *
     * @param string $source_file
     *   The source file. The file must conform to the format in the
     *   Freedesktop.org database.
     *
     * @return string[]
     *   An array of error messages.
     */
    public function loadMapFromFreedesktopFile(string $source_file): array
    {
        $errors = [];

        $contents = @file_get_contents($source_file);
        if ($contents == false) {
            $errors[] = 'Failed loading file ' . $source_file;
            return $errors;
        }

        $xml = @simplexml_load_string($contents);
        if ($xml == false) {
            $errors[] = 'Malformed XML in file ' . $source_file;
            return $errors;
        }

        $aliases = [];

        foreach ($xml as $node) {
            $exts = [];
            foreach ($node->glob as $glob) {
                $pattern = (string) $glob['pattern'];
                if ('*' != $pattern[0] || '.' != $pattern[1]) {
                    continue;
                }
                $exts[] = substr($pattern, 2);
            }
            if (empty($exts)) {
                continue;
            }

            $type = (string) $node['type'];

            // Add description.
            if (isset($node->comment)) {
                $this->map->addTypeDescription($type, (string) $node->comment[0]);
            }
            if (isset($node->acronym)) {
                $acronym = (string) $node->acronym;
                if (isset($node->{'expanded-acronym'})) {
                    $acronym .= ': ' . (string) $node->{'expanded-acronym'};
                }
                $this->map->addTypeDescription($type, $acronym);
            }

            // Add extensions.
            foreach ($exts as $ext) {
                $this->map->addTypeExtensionMapping($type, $ext);
            }

            // All aliases are accumulated and processed at the end of the
            // cycle to allow proper consistency checking on the completely
            // developed list of types.
            foreach ($node->alias as $alias) {
                $aliases[$type][] = (string) $alias['type'];
            }
        }

        // Add all the aliases, provide logging of errors.
        foreach ($aliases as $type => $a) {
            foreach ($a as $alias) {
                try {
                    $this->map->addTypeAlias($type, $alias);
                } catch (MappingException $e) {
                    $errors[] = $e->getMessage();
                }
            }
        }
        $this->map->sort();

        return $errors;
    }

    /**
     * @todo
     *
     * @param string $yaml_file
     *   A YAML file with the list of MIME-types to actually pick from the
     *   currently loaded map.
     *
     * @return string[]
     *   An array of error messages.
     *
     * @throws \RuntimeException
     *   If it was not possible to access the file.
     */
    public function filterWithList($yaml_file)
    {
        $source_map_array = $this->map->getMapArray();
        $errors = [];

        // Get the raw filter from the user file.
        $filter = Yaml::parse(file_get_contents(__DIR__ . '/../resources/' . $yaml_file));

        // Clean the raw filter, make each MIME type unique.
        $filter_types = [];
        foreach ($filter as $f) {
            try {
                $type = $this->map->normalizeType($f['mimetype']);
            } catch (MalformedTypeException $e) {
                $errors[] = $f['mimetype'] . ' - ' . $e->getMessage();
                continue;
            }

            if ($this->map->hasType($type)) {
                $filter_types[$type] = $type;
            } elseif ($this->map->hasAlias($type)) {
                // If the filter type is an alias, add the parent.
                $t = $this->map->getAliasTypes($type);
                // @todo ensure $t has only one entry.
                $filter_types[$t[0]] = $t[0];
            }
        }

        // Add MIME types that are inducted by additional extensions associated
        // to the filtered ones.
        while (true) {
dump('************ ROUND **************');
            $add_types = [];
            foreach ($filter_types as $type) {
                foreach ($this->map->getTypeExtensions($type) as $ext) {
                    foreach ($this->map->getExtensionTypes($ext) as $ext_type) {
                        if (!in_array($ext_type, $filter_types)) {
                            dump([$type, $ext, $ext_type]);
                            $add_types[$ext_type] = $ext_type;
                        }
                    }
                }
                foreach ($this->map->getTypeAliases($type) as $alias) {
                    foreach ($this->map->getAliasTypes($alias) as $alias_type) {
                        if (!in_array($alias_type, $filter_types)) {
                            dump([$type, $alias, $alias_type]);
                            $add_types[$alias_type] = $alias_type;
                        }
                    }
                }
            }
            if ($add_types === []) {
                break;
            }
            $filter_types = array_merge($filter_types, $add_types);
        }

        $types_for_removal = array_diff($this->map->listTypes(), $filter_types);
        foreach ($types_for_removal as $type) {
            $this->map->removeType($type);
        }

        $this->map->sort();

        foreach ($this->map->listTypes() as $type) {
            if ($this->map->getTypeExtensions($type) !== $source_map_array['t'][$type]['e']) {
                dump([$type, $this->map->getTypeExtensions($type), $source_map_array['t'][$type]['e']]);
            }
        }
        foreach ($this->map->listExtensions() as $extension) {
            if ($this->map->getExtensionTypes($extension) !== $source_map_array['e'][$extension]['t']) {
                dump([$extension, $this->map->getExtensionTypes($extension), $source_map_array['e'][$extension]['t']]);
            }
        }
        foreach ($this->map->listAliases() as $alias) {
            if ($this->map->getAliasTypes($alias) !== $source_map_array['a'][$alias]['t']) {
                dump([$alias, $this->map->getAliasTypes($alias), $source_map_array['a'][$alias]['t']]);
            }
        }


//dump($this->map);
        return $errors;
    }

    /**
     * Applies to the map an array of overrides.
     *
     * @param array<int,array{0: string, 1: array<string>}> $overrides
     *   The overrides to be applied.
     *
     * @return string[]
     *   An array of error messages.
     */
    public function applyOverrides(array $overrides): array
    {
        $errors = [];

        foreach ($overrides as $command) {
            try {
                $callable = [$this->map, $command[0]];
                assert(is_callable($callable));
                call_user_func_array($callable, $command[1]);
            } catch (MappingException $e) {
                $errors[] = $e->getMessage();
            }
        }
        $this->map->sort();

        return $errors;
    }

    /**
     * Updates the map at a destination PHP file.
     *
     * @return $this
     */
    public function writeMapToPhpClassFile(string $file): MapUpdater
    {
        $content = @file_get_contents($file);
        if ($content == false) {
            throw new \RuntimeException('Failed loading file ' . $file);
        }

        $newContent = preg_replace(
            '#protected static \$map = (.+?);#s',
            "protected static \$map = " . preg_replace('/\s+$/m', '', var_export($this->map->getMapArray(), true)) . ";",
            $content
        );
        file_put_contents($file, $newContent);

        return $this;
    }
}
