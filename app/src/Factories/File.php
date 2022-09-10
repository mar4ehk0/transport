<?php

namespace Mar4ehk0\Factories;

interface File
{
    public function open(): bool;
    public function readRow(): mixed;
    public function close(): bool;
    public function eof(): bool;
}
