<?php

namespace Mar4ehk0\Factories;

use Mar4ehk0\Services\TransportCreator;

interface AppFactory
{
    public function createFile(\SplFileObject $fileObject): File;
    public function createParser(TransportCreator $transportCreator): Parser;
}
