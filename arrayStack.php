<?php

interface Stack
{
    public function push(string $newItem);

    public function pop();

    public function top();

    public function isEmpty();
}

class Books implements Stack
{
    private $limit;
    private $stack;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    public function push(string $newItem)
    {
        if (count($this->stack) === $this->limit) {
            throw new OverflowException("Stack is full");
        } else {
            array_push($this->stack, $newItem);
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Stack is Empty');
        } else {
            return array_pop($this->stack);
        }
    }

    public function top()
    {
        return end($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }
}