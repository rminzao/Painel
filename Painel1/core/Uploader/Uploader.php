<?php

namespace Core\Uploader;

/**
 * Class Uploader
 *
 * @author Gabriel Amorim <https://github.com/amorim778>
 * @package Core\Uploader
 */
abstract class Uploader
{
    /** @var string */
    protected $path;

    /** @var resource|\GdImage */
    protected $file;

    /** @var string */
    protected $name;

    /** @var string */
    protected $ext;

    /** @var array */
    protected static $allowTypes = [];

    /** @var array */
    protected static $extensions = [];

    /**
     * @param string $uploadDir
     * @param string $fileTypeDir
     * @param bool $monthYearPath
     * @example $u = new Upload("storage/uploads", "images");
     */
    public function __construct(string $uploadDir, string $fileTypeDir, bool $monthYearPath = false)
    {
        $this->dir($uploadDir);
        $this->dir("{$uploadDir}/{$fileTypeDir}");
        $this->path = "{$uploadDir}/{$fileTypeDir}";

        if ($monthYearPath) {
            $this->path("{$uploadDir}/{$fileTypeDir}");
        }
    }

    /**
     * @return array
     */
    public static function isAllowed(): array
    {
        return static::$allowTypes;
    }

    /**
     * @return array
     */
    public static function isExtension(): array
    {
        return static::$extensions;
    }

    /**
     * @param string $name
     * @return string
     */
    protected function name(string $name): string
    {
        $name = filter_var(mb_strtolower($name), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';
        $name = str_replace(
            ["-----", "----", "---", "--"],
            "-",
            str_replace(" ", "-", trim(strtr(utf8_decode($name), utf8_decode($formats), $replace)))
        );

        $this->name = "{$name}." . $this->ext;

        if (file_exists("{$this->path}/{$this->name}") && is_file("{$this->path}/{$this->name}")) {
            //$this->name = "{$name}-" . time() . ".{$this->ext}";
        }
        return $this->name;
    }

    /**
     * @param string $dir
     * @param int $mode
     */
    protected function dir(string $dir, int $mode = 0755): void
    {
        if (!file_exists($dir) || !is_dir($dir)) {
            mkdir($dir, $mode, true);
        }
    }

    /**
     * @param string $path
     */
    protected function path(string $path): void
    {
        list($yearPath, $mothPath) = explode("/", date("Y/m"));

        $this->dir("{$path}/{$yearPath}");
        $this->dir("{$path}/{$yearPath}/{$mothPath}");
        $this->path = "{$path}/{$yearPath}/{$mothPath}";
    }

    /**
     * @param $inputName
     * @param $files
     * @return array
     */
    public function multiple($inputName, $files): array
    {
        $gbFiles = [];
        $gbCount = count($files[$inputName]["name"]);
        $gbKeys = array_keys($files[$inputName]);

        for ($gbLoop = 0; $gbLoop < $gbCount; $gbLoop++) :
            foreach ($gbKeys as $key) :
                $gbFiles[$gbLoop][$key] = $files[$inputName][$key][$gbLoop];
            endforeach;
        endfor;

        return $gbFiles;
    }
}
