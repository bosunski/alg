<?php

/**
 * Interface Stack
 *
 * Access: O(n) - TC
 * Search: O(n) - TC
 * Space Complexity - O(n)
 */
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