<?php

namespace Mar4ehk0\Factories;

interface AppFactory
{
    public function createFile(\SplFileObject $fileObject): File;
    public function createParser(): Parser;
}
