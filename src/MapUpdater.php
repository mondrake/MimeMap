<?php

namespace FileEye\MimeMap;

use FileEye\MimeMap\Map\AbstractMap;
use Symfony\Component\Yaml\Yaml;

/**
 * Compiles the MIME type to file extension map.
 */
class MapUpdater
{
    /**
     * The default, empty, base map to use for update.
     */
    const DEFAULT_BASE_MAP_CLASS = '\FileEye\MimeMap\Map\EmptyMap';

    /**
     * The AbstractMap object to update.
     *
     * @var AbstractMap
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
    public static function getDefaultMapBuildFile()
    {
        return __DIR__ . '/../resources/default_map_build.yml';
    }

    /**
     * Returns the AbstractMap object being updated.
     *
     * @return AbstractMap
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Sets the AbstractMap object to update.
     *
     * @param string $map_class
     *   The FQCN of the map to be updated.
     *
     * @return $this
     */
    public function selectBaseMap($map_class)
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
    public function loadMapFromApacheFile($source_file)
    {
        $errors = [];

        $lines = @file($source_file);
        if ($lines === false) {
            throw new \RuntimeException("Failed accessing {$source_file}");
        }
        foreach ($lines as $line) {
            if ($line[0] == '#') {
                continue;
            }
            $line = preg_replace("#\\s+#", ' ', trim($line));
            $parts = explode(' ', $line);
            $type = array_shift($parts);
            foreach ($parts as $extension) {
                $this->map->addTypeExtensionMapping($type, $extension);
            }
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
    public function loadMapFromFreedesktopFile($source_file)
    {
        $errors = [];
        $xml = simplexml_load_string(file_get_contents($source_file));
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
            }
            if ($add_types === []) {
                break;
            }
            $filter_types = array_merge($filter_types, $add_types);
        }

        $types_for_removal = array_diff($this->map->listTypes(), $filter_types);
//dump($types_for_removal);
        foreach ($types_for_removal as $type) {
            $this->map->removeType($type);
        }

        $this->map->sort();
dump($this->map);
        return $errors;
    }

    /**
     * Applies to the map an array of overrides.
     *
     * @param array $overrides
     *   The overrides to be applied.
     *
     * @return string[]
     *   An array of error messages.
     */
    public function applyOverrides(array $overrides)
    {
        $errors = [];

        foreach ($overrides as $command) {
            try {
                call_user_func_array([$this->map, $command[0]], $command[1]);
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
    public function writeMapToPhpClassFile($file)
    {
        $content = preg_replace(
            '#protected static \$map = (.+?);#s',
            "protected static \$map = " . preg_replace('/\s+$/m', '', var_export($this->map->getMapArray(), true)) . ";",
            file_get_contents($file)
        );
        file_put_contents($file, $content);
        return $this;
    }
}
