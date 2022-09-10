<?php

namespace Mar4ehk0\Models;

use Mar4ehk0\DTO\BaseCarDTO;
use Mar4ehk0\DTO\TruckBodySizeDTO;

class Truck extends BaseCar
{
    private float $length;
    private float $width;
    private float $height;

    public function __construct(BaseCarDTO $baseCarDTO, TruckBodySizeDTO $truckBodySizeDTO)
    {
        parent::__construct($baseCarDTO);
        $this->length = $truckBodySizeDTO->length;
        $this->width = $truckBodySizeDTO->width;
        $this->height = $truckBodySizeDTO->height;
    }
}
