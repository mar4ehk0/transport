<?php

namespace Mar4ehk0\Models\Transport;

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

    public function getPhotoFileExt(): ?string
    {
        $fileName = explode('.', $this->photoFileName);
        return $fileName[1] ?? null;
    }

    public function getDescription(): string
    {
        return $this->carType . ', ' . $this->brand . ', ' . $this->photoFileName . ', ' . $this->carrying;
    }
}
