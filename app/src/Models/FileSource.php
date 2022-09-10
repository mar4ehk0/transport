<?php

namespace Mar4ehk0\Models;

use SplFileObject;

class FileSource
{
    public function __construct(private SplFileObject $fileObject)
    {
    }

    public function getFileName(): string
    {
        return $this->fileObject->getFilename();
    }

    public function getExtension(): string
    {
        return $this->fileObject->getExtension();
    }

    public function getPath(): string
    {
        return $this->fileObject->getRealPath();
    }
}
