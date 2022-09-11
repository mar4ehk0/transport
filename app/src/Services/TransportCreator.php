<?php

namespace Mar4ehk0\Services;

use Mar4ehk0\DTO\BaseCarDTO;
use Mar4ehk0\DTO\TruckBodySizeDTO;
use Mar4ehk0\Models\Transport\BaseCar;
use Mar4ehk0\Models\Transport\Car;
use Mar4ehk0\Models\Transport\SpecMachine;
use Mar4ehk0\Models\Transport\Truck;
use Mar4ehk0\Models\Transport\Types;

class TransportCreator
{
    public function create(array $item): ?BaseCar
    {
        if (!array_is_list($item)) {
            return null;
        }

        $baseCarDTO = new BaseCarDTO(
            (string)$item[0],
            (string)$item[1],
            (string)$item[3],
            (float)$item[5]
        );

        if ($item[0] === Types::Car->value) {
            return $this->createCar($baseCarDTO, $item);
        }
        if ($item[0] === Types::Truck->value) {
            return $this->createTruck($baseCarDTO, $item);
        }
        if ($item[0] === Types::SpecMachine->value) {
            return $this->createSpecMachine($baseCarDTO, $item);
        }

        return null;
    }

    private function createCar(BaseCarDTO $baseCarDTO, array $item): Car
    {
        return new Car($baseCarDTO, (int)$item[2]);
    }

    private function createTruck(BaseCarDTO $baseCarDTO, array $item): Truck
    {
        $sizeRow = (string)$item[4];
        if (empty($sizeRow)) {
            $length = $width = $height = 0;
        } else {
            $size = explode('x', $sizeRow);
            [$length, $width, $height] = $size;
        }
        $truckBodySizeDTO = new TruckBodySizeDTO((float)$length, (float)$width, (float)$height);
        return new Truck($baseCarDTO, $truckBodySizeDTO);
    }

    private function createSpecMachine(BaseCarDTO $baseCarDTO, array $item): SpecMachine
    {
        return new SpecMachine($baseCarDTO, (string)$item[6]);
    }
}
