<?php

include_once "llPriority.php";
include_once "QueueInterface.php";

class AgentQueue implements QueueInterface
{
    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new PriorityLinkedList;
    }

    public function enqueue(string $newItem, $priority = null): void
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem, $priority);
        } else {
            throw new OverflowException("Queue is full!");
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty!");
        } else {
            $lastItem = $this->peek();
            $this->queue->deleteFirst();

            return $lastItem;
        }
    }

    public function peek()
    {
        return $this->queue->getNthNode(1)->data;
    }

    public function isEmpty(): bool
    {
        return $this->queue->getSize() == 0;
    }

    public function display()
    {
        $this->queue->display();
    }
}
try {
    $agents = new AgentQueue(10);
    $agents->enqueue("Fred", 1);
    $agents->enqueue("John", 2);
    $agents->enqueue("Keith", 3);
    $agents->enqueue("Adiyan", 4);
    $agents->enqueue("Mikhael", 2);
    $agents->display();
    echo $agents->dequeue()."\n";
    echo $agents->dequeue()."\n";
} catch (Exception $e) {
    echo $e->getMessage();
}