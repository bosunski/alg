<?php

class ListNode
{
    public $data = null;
    public $next = null;
    public $prev = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

class DoublyLinkedList
{
    private $firstNode = null;
    private $lastNode = null;
    private $totalNode = null;

    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
            $this->lastNode = &$newNode;
        } else {
            $currentFirstNode = $this->firstNode;
            $this->firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->prev = $newNode;
        }

        $this->totalNode++;

        return true;
    }

    public function insertAtLast(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
            $this->lastNode = &$newNode;
        } else {
            $currentNode = $this->lastNode;
            $currentNode->next = $newNode;
            $newNode->prev = $currentNode;
            $this->lastNode = $newNode;
        }

        $this->totalNode--;

        return true;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode) {
            $previous = null;
            $currentFirstNode = $this->firstNode;

            while ($currentFirstNode !== null) {
                if ($currentFirstNode->data === $query) {
                    $newNode->next = $currentFirstNode;
                    $currentFirstNode->prev = $newNode;
                    $newNode->prev = $previous;
                    $this->totalNode++;

                    break;
                }
                $previous = $currentFirstNode;
                $currentFirstNode = $currentFirstNode->next;
            }
        }
    }
}