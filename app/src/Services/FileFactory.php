<?php

namespace Mar4ehk0\Services;

use Mar4ehk0\Models\FileSource;
use SplFileObject;

class FileFactory
{
    public static function create(): FileSource
    {
        $options = getopt("f:");
        self::validate($options);
        $splFile = new SplFileObject($options['f']);
        return new FileSource($splFile);
    }

    /**
     * @throws \RuntimeException
     */
    private static function validate(array $options): bool
    {
        if (empty($options) || empty($options['f'])) {
            throw new \RuntimeException('Please give me file. index.php -f filename.csv');
        }

        if (file_exists($options['f'])) {
            return true;
        }

        throw new \RuntimeException('Please check path to file.');
    }

}
