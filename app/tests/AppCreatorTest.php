<?php

use Mar4ehk0\Factories\AppCreator;
use Mar4ehk0\Factories\Csv\CsvFactory;
use PHPUnit\Framework\TestCase;

class AppCreatorTest extends TestCase
{
    public function testSuccess()
    {
        $type = 'csv';
        $factory = AppCreator::getFactory($type);

        $this->assertInstanceOf(CsvFactory::class, $factory);
    }

    public function testFailUnsupported()
    {
        $type = 'doc';
        $this->expectException('InvalidArgumentException');
        $this->expectDeprecationMessage('Unsupported parser type');
        $factory = AppCreator::getFactory($type);
    }

    /**
     * @dataProvider getNotSupported
     */
    public function testFailNotImplemented($type, $msg)
    {
        $this->expectException('DomainException');
        $this->expectDeprecationMessage($msg);
        $factory = AppCreator::getFactory($type);
    }

    public function getNotSupported()
    {
        return[
            'xml' => ['type' => 'xml', 'msg' => 'XML Parser was not implemented. Use csv format'],
            'json' => ['type' => 'json', 'msg' => 'JSON Parser was not implemented. Use csv format']
        ];
    }
}
