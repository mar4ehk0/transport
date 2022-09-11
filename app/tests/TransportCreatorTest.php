<?php

use Mar4ehk0\Models\Transport\Car;
use Mar4ehk0\Models\Transport\SpecMachine;
use Mar4ehk0\Models\Transport\Truck;
use Mar4ehk0\Services\TransportCreator;
use PHPUnit\Framework\TestCase;

class TransportCreatorTest extends TestCase
{

    private TransportCreator $creator;

    public function getParamsFails()
    {
        return [
            'empty param' => [[null]],
            'wrong number item' => [['aa','bb', '45']],
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->creator = new TransportCreator();
    }

    public function testParamIsNotList()
    {
        $param = ['a' => 'transport', 'b', 'c', 'd', 'e'];
        $this->assertNull($this->creator->create($param));
    }

    public function testCreateCar()
    {
        $param = [
            'car',
            'Nissan',
            '6',
            'image.png',
            '',
            '87.7'
        ];
        $result = $this->creator->create($param);
        $this->assertInstanceOf(Car::class, $result);
    }

    public function testCreateTruck()
    {
        $param = [
            'truck',
            'Man',
            '',
            'image',
            '8x3x2.5',
            '77'
        ];
        $result = $this->creator->create($param);
        $this->assertInstanceOf(Truck::class, $result);
    }

    public function testCreateSpecMachine()
    {
        $param = [
            'spec_machine',
            'Spec!!!',
            '',
            'image1.png',
            '',
            '77',
            'extra text'
        ];
        $result = $this->creator->create($param);
        $this->assertInstanceOf(SpecMachine::class, $result);
    }

    /**
     * @dataProvider getParamsFails
     */
    public function testCreateFailt($param)
    {
        $result = $this->creator->create($param);
        $this->assertNull($result);
    }
}
