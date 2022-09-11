<?php

namespace Mar4ehk0\Factories\Csv;

use Mar4ehk0\Factories\File;
use Mar4ehk0\Factories\Parser;

class CsvParser extends Parser
{
    protected function do(File $file): int
    {
        $generator = $this->createGenerator($file);

        /** @var array $firstRow */
        $firstRow = $generator->current();
        $collNumValid = count($firstRow);
        $row = 0;

        /** @var array $item */
        foreach ($generator as $item) {
            if ($row !== 0) {
                if ($this->isValidRow($collNumValid, $item)) {
                    $this->createTransport($item);
                }
            }
            $row++;
        }

        return $row;
    }

    private function createGenerator(File $file): \Generator
    {
        while (!$file->eof()) {
            yield $file->readRow();
        }
    }

    private function isValidRow(int $collNumValid, mixed $item): bool
    {
        return is_array($item) && $collNumValid === count($item);
    }
}
