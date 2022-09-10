<?php

namespace Mar4ehk0\Factories\Csv;

use Mar4ehk0\Factories\File;
use Mar4ehk0\Factories\Parser;
use Mar4ehk0\Models\Transport\Collection;

class CsvParser implements Parser
{

    public function getCarList(File $file): Collection
    {
        $generator = $this->createGenerator($file);

        $row = 0;
        foreach ($generator as $item) {
            if ($row !== 0) {
                var_dump($item);
            }
            $row++;
        }

        return new Collection();
    }

    private function createGenerator(File $file): \Generator
    {
        while (!$file->eof()) {
            yield $file->readRow();
        }
    }
}
