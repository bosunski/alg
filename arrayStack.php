<?php

include_once "StackInterface.php";


class Books implements Stack
{
    private $limit;
    private $stack;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    // O(1) - TC
    public function push(string $newItem)
    {
        if (count($this->stack) === $this->limit) {
            throw new OverflowException("Stack is full");
        } else {
            array_push($this->stack, $newItem);
        }
    }

    // O(1) - TC
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Stack is Empty');
        } else {
            return array_pop($this->stack);
        }
    }

    // O(1) - TC
    public function top()
    {
        return end($this->stack);
    }

    // O(1) - TC
    public function isEmpty()
    {
        return empty($this->stack);
    }
}