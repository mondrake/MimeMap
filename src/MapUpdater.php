<?php

namespace FileEye\MimeMap;

use FileEye\MimeMap\Map\AbstractMap;

/**
 * Compiles the MIME type to file extension map.
 */
class MapUpdater
{
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
     * Constructor.
     *
     * @param AbstractMap $map
     *   The map.
     */
    public function __construct(AbstractMap $map)
    {
        $this->map = $map;
    }

    /**
     * Loads a new type-to-extension map reading from a file in Apache format.
     *
     * @param string $source_file
     *   The source file. The file must conform to the format in the Apache
     *   source code repository file where MIME types and file extensions are
     *   associated.
     *
     * @throws \RuntimeException if file I/O error occurs.
     *
     * @return $this
     */
    public function loadMapFromApacheFile($source_file)
    {
        $lines = file($source_file);
        foreach ($lines as $line) {
            if ($line{0} == '#') {
                continue;
            }
            $line = preg_replace("#\\s+#", ' ', trim($line));
            $parts = explode(' ', $line);
            $type = array_shift($parts);
            foreach ($parts as $extension) {
                $this->map->addMapping($type, $extension);
            }
        }
        $map_array = $this->map->getMapArray();
        if (empty($map_array)) {
            throw new \RuntimeException('No data found in file ' . $source_file);
        }
        return $this;
    }

    /**
     * Applies to the map an array of overrides.
     *
     * @param array $overrides
     *   The overrides to be applied.
     *
     * @return $this
     */
    public function applyOverrides(array $overrides)
    {
        foreach ($overrides as $command) {
            call_user_func_array([$this->map, $command[0]], $command[1]);
        }
        return $this;
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
            "protected static \$map = " . var_export($this->map->getMapArray(), true) . ";",
            file_get_contents($file)
        );
        file_put_contents($file, $content);
        return $this;
    }
}
