<?php

namespace Mar4ehk0\DTO;

class BaseCarDTO
{
    public function __construct(
        public readonly string $carType,
        public readonly string $brand,
        public readonly string $photoFileName,
        public readonly float $carrying,
    ) {
    }
}
