<?php

namespace Mar4ehk0;

class AppValidator
{

    public function __construct(private array $options)
    {
    }

    public function validate(): bool
    {
        if (empty($this->options) || empty($this->options['f'])) {
            throw new \InvalidArgumentException('Please give me file. index.php -f filename.csv');
        }

        if (file_exists((string)$this->options['f'])) {
            return true;
        }

        throw new \InvalidArgumentException('Please check path to file.');
    }
}
