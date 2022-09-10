<?php

namespace Mar4ehk0\Factories\Csv;

use Mar4ehk0\Factories\AppFactory;
use Mar4ehk0\Factories\File;
use Mar4ehk0\Factories\Parser;
use SplFileObject;

class CsvFactory implements AppFactory
{
    public function createFile(SplFileObject $fileObject): File
    {
        return new CsvFile($fileObject);
    }

    public function createParser(): Parser
    {
        return new CsvParser();
    }
}
