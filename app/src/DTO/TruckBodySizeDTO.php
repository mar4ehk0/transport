<?php

namespace Mar4ehk0\DTO;

class TruckBodySizeDTO
{
    public function __construct(
        public readonly float $length,
        public readonly float $width,
        public readonly float $height,
    )
    {
    }
}
