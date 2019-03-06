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

    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode) {
            $nextNode = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    if ($currentNode === $this->lastNode) {
                        $this->lastNode = $newNode;
                    }

                    $currentNode->next = $newNode;
                    $nextNode->prev = $newNode;
                    $newNode->prev = $currentNode;
                    $this->totalNode++;

                    break;
                }

                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    public function deleteFirst()
    {
        if ($this->firstNode !== null) {
            if ($this->firstNode->next !== null) {
                $this->firstNode = $this->firstNode->next;
            } else {
                $this->firstNode = null;
            }

            $this->totalNode--;

            return true;
        }

        return false;
    }

    public function deleteLast()
    {
        if ($this->lastNode !== null) {
            $currentNode = $this->lastNode;

            if ($currentNode->prev === null) {
                $this->firstNode = null;
                $this->lastNode = null;
            } else {
                $previousNode = $currentNode->prev;
                $this->lastNode = $previousNode;
                $previousNode->next = null;

                $this->totalNode--;

                return true;
            }
        }

        return false;
    }
}