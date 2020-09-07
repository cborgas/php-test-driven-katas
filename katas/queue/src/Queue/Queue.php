<?php

namespace Queue;

/**
 * FIFO Queue
 */
class Queue
{
    /**
     * @var T $items
     */
    private array $items;

    /**
     * @param array<T> $items
     */
    public function __construct(array $items = null)
    {
        $this->items = $items ?? [];
    }

    /**
     * @return T
     */
    public function pop()
    {

        $this->validate();

        $firstItem = $this->items[0];

        array_shift($this->items);

        return $firstItem;
    }

    /**
     * @return T
     */
    public function peek()
    {
        $this->validate();

        return $this->items[0];
    }

    /**
     * @param T $item
     */
    public function push($item): void
    {
        $this->items[] = $item;
    }

    private function validate(): void
    {
        if (!isset($this->items[0])) {
            throw new \UnderflowException("Empty queue");
        }
    }
}
