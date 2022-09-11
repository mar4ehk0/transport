<?php

use Mar4ehk0\AppValidator;
use PHPUnit\Framework\TestCase;

class AppValidatorTest extends TestCase
{
    private const FILE_PATH = '/tmp/source.csv';

    private $source;

    public function getOptions()
    {
        return [
            'empty array' => [[]],
            'without file' => [['f']],
            'random data' => [['random']]
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->source = fopen(self::FILE_PATH, "w");
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        fclose($this->source);
        unlink(self::FILE_PATH);
    }

    /**
     * @dataProvider getOptions
     */
    public function testEmptyOptions($options)
    {
        $app = new AppValidator($options);
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Please give me file. index.php -f filename.csv');
        $app->validate();
    }

    public function testFileExist()
    {
        $options = ['f' => self::FILE_PATH];

        $app = new AppValidator($options);
        $this->assertTrue($app->validate());
    }

    public function testFileNotExist()
    {
        $options = ['f' => '/random/path/to/file'];

        $app = new AppValidator($options);
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Please check path to file.');
        $this->assertFalse($app->validate());
    }
}
