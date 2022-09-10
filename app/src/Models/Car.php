<?php

namespace Mar4ehk0\Models;

use Mar4ehk0\DTO\BaseCarDTO;

class Car extends BaseCar
{
    private int $passengerSeatsCount;

    public function __construct(BaseCarDTO $baseCarDTO, int $passengerSeatsCount)
    {
        parent::__construct($baseCarDTO);
        $this->passengerSeatsCount = $passengerSeatsCount;
    }
}
