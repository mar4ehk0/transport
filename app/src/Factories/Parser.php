<?php

namespace Mar4ehk0\Factories;

use Mar4ehk0\Models\Transport\Collection;

interface Parser
{
    public function getCarList(File $file): Collection;
}
