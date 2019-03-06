<?php

class BookList implements Stack
{
    private $stack;

    public function __construct()
    {
        $this->stack = new LinkedList();
    }

    public function push(string $newItem)
    {
        $this->stack->insert($newItem);
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Stack is empty.');
        } else {
            $lastItem = $this->top();
            $this->stack->deleteLast();
            return $lastItem;
        }
    }

    public function top()
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    public function isEmpty()
    {
        return $this->stack->getSize() == 0;
    }
}