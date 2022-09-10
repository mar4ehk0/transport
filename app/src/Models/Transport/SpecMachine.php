<?php

namespace Mar4ehk0\Models\Transport;

use Mar4ehk0\DTO\BaseCarDTO;

class SpecMachine extends BaseCar
{
    private string $extra;

    public function __construct(BaseCarDTO $baseCarDTO, string $extra)
    {
        parent::__construct($baseCarDTO);
        $this->extra = $extra;
    }
}
