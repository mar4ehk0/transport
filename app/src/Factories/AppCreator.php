<?php

namespace Mar4ehk0\Factories;


use Mar4ehk0\Factories\Csv\CsvFactory;

class AppCreator
{
    private const CSV = 'csv';
    private const XML = 'xml';
    private const JSON = 'json';

    public static function getFactory(string $extensionFile): AppFactory
    {
        return match ($extensionFile) {
            self::CSV => new CsvFactory(),
            self::XML => throw new \DomainException('XML Parser was not implemented. Use csv format'),
            self::JSON => throw new \DomainException('JSON Parser was not implemented. Use csv format'),
            default => throw new \InvalidArgumentException('Unsupported parser type'),
        };
    }
}
