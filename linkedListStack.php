<?php
include_once "StackInterface.php";
include_once "ll.php";

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

try {
    $programmingBooks = new BookList();
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering Java");
    $programmingBooks->push("MySql Workbench tutorial");

    echo $programmingBooks->pop(), PHP_EOL;
    echo $programmingBooks->pop(), PHP_EOL;
    echo $programmingBooks->top(), PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}