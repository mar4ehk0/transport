<?php

namespace Mar4ehk0\Factories;

use Mar4ehk0\Models\Transport\Collection;
use Mar4ehk0\Services\TransportCreator;

abstract class Parser
{

    protected Collection $collection;

    public function __construct(private TransportCreator $transportCreator)
    {
        $this->collection = new Collection();
    }

    public function getCarList(File $file): Collection
    {
        $this->collection->reset();
        $this->do($file);
        return $this->collection;
    }

    protected function createTransport(array $item): void
    {
        $transport = $this->transportCreator->create($item);
        if ($transport) {
            $this->collection->add($transport);
        }
    }

    abstract protected function do(File $file): int;
}
