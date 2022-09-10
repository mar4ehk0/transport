<?php

namespace Mar4ehk0\Models;

use Mar4ehk0\DTO\BaseCarDTO;

class BaseCar
{
    private string $carType;
    private string $photoFileName;
    private string $brand;
    private float $carrying;

    public function __construct(BaseCarDTO $baseCarDTO)
    {
        $this->carType = $baseCarDTO->carType;
        $this->photoFileName = $baseCarDTO->photoFileName;
        $this->brand = $baseCarDTO->brand;
        $this->carrying = $baseCarDTO->carrying;
    }

    public function getPhotoFileExt()
    {

    }
}
