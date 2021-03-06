<?php

namespace Amranidev\Lpackager\FileSystem;

class Filesystem extends \Exception
{
    /**
     * Make a file.
     *
     * @param $file
     * @param $content
     *
     * @throws FileAlreadyExists
     *
     * @return int
     */
    public function make($file, $content)
    {
        if ($this->exists($file)) {
            throw new \Exception('FileAlreadyExists');
        }

        return file_put_contents($file, $content);
    }

    /**
     * Determine if file exists.
     *
     * @param $file
     *
     * @return bool
     */
    public function exists($file)
    {
        return file_exists($file);
    }

    /**
     * make Directory.
     */
    public function makeDir($path)
    {
        if (is_dir($path)) {
            throw new \Exception('FileAlreadyExists');
        }
        mkdir($path, 0777, true);
    }

    /**
     * File Append.
     */
    public function append($path, $content)
    {
        return file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
    }
}
