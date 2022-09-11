<?php

namespace Mar4ehk0\Models\Transport;

use RuntimeException;

class Collection implements \Iterator
{
    private int $pointer = 0;
    private int $total = 0;

    /** @var BaseCar[]  */
    private array $objects = [];

    public function add(BaseCar $baseCar): void
    {
        $this->objects[$this->total] = $baseCar;
        $this->total++;
    }

    private function getRow(int $num): ?BaseCar
    {
        if ($num >= $this->total || $num < 0) {
            return null;
        }
        return $this->objects[$num];
    }

    public function current(): BaseCar
    {
        $result = $this->getRow($this->pointer);
        if ($result) {
            return $result;
        }

        throw new RuntimeException('Item does not exist.');
    }

    public function next(): void
    {
        $this->pointer++;
    }

    public function key(): int
    {
        return $this->pointer;
    }

    public function valid(): bool
    {
        return (!is_null($this->getRow($this->pointer)));
    }

    public function rewind(): void
    {
        $this->pointer = 0;
    }

    public function reset(): void
    {
        unset($this->objects);
        $this->pointer = 0;
        $this->total = 0;
    }

    public function count(): int
    {
        return $this->total;
    }
}
