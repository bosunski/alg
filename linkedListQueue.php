<?php

class AgentQueue implements QueueInterface
{
    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList;
    }

    public function enqueue(string $newItem): void
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem);
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
}