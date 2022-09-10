<?php

namespace Mar4ehk0\Factories\Csv;

use Mar4ehk0\Factories\File;
use SplFileObject;

class CsvFile implements File
{

    public function __construct(private SplFileObject $fileObject)
    {
        $this->fileObject->setFlags(SplFileObject::SKIP_EMPTY);

        $separator = config_get('CSV_SEPARATOR');
        $this->fileObject->setCsvControl($separator);
    }

    public function open(): bool
    {
        $this->fileObject->rewind();
        return true;
    }

    public function readRow(): mixed
    {
        return $this->fileObject->fgetcsv();
    }

    public function close(): bool
    {
        return true;
    }

    public function eof(): bool
    {
        return $this->fileObject->eof();
    }
}
