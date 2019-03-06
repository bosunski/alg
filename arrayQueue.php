<?php

include_once "QueueInterface.php";

class AgentQueue implements QueueInterface
{
    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function enqueue(string $newItem): void
    {
        if (count($this->queue) < $this->limit) {
            array_push($this->queue, $newItem);
        } else {
            throw new OverflowException("Queue is full!");
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty!");
        } else {
            return array_shift($this->queue);
        }
    }

    public function peek()
    {
        return current($this->queue);
    }

    public function isEmpty(): bool
    {
        return empty($this->queue);
    }
}

try {
    $agents = new AgentQueue(10);

    $agents->enqueue("Fred");
    $agents->enqueue("John");
    $agents->enqueue("keith");
    $agents->enqueue("Adiyan");
    $agents->enqueue("Mikhael");

    echo $agents->dequeue(), PHP_EOL;
    echo $agents->dequeue(), PHP_EOL;

    echo $agents->dequeue(), PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}