<?php

namespace Mar4ehk0;

use Mar4ehk0\Factories\AppCreator;
use Mar4ehk0\Factories\File;
use Mar4ehk0\Factories\Parser;
use Mar4ehk0\Services\TransportCreator;
use SplFileObject;

class App
{

    private File $file;
    private Parser $parser;

    public function __construct()
    {
        $param = $this->getParam();
        (new AppValidator($param))->validate();

        $file = $this->getFile($param['f']);

        $factory = AppCreator::getFactory($file->getExtension());
        $this->file = $factory->createFile($file);
        $this->parser = $factory->createParser(new TransportCreator());
    }

    public function run(): void
    {
        $this->parser->getCarList($this->file);
    }

    private function getParam(): array
    {
        return getopt("f:");
    }

    private function getFile(string $filePath): SplFileObject
    {
        return new SplFileObject($filePath);
    }

}
