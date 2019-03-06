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

/**
 * Class DoublyLinkedList
 *
 * Search:
 **** WCTC: O(n)
 **** ACTC: O(n)
 * Access:
 **** WCTC: O(n)
 **** ACTC: O(n)
 */
class DoublyLinkedList
{
    private $firstNode = null;
    private $lastNode = null;
    private $totalNode = null;

    /**
     * WCTC: O(1)
     * ACTC: O(1)
     *
     * @param string|null $data
     * @return bool
     */
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

    /**
     *
     * @param string|null $data
     * @return bool
     */
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

    /**
     * WCTC: O(1)
     * ACTC: O(1)
     * @return bool
     */
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

    public function delete(string $query = null)
    {
        if ($this->firstNode) {
            $previous = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === null) {
                        $previous->next = null;
                    } else {
                        $previous->next = $currentNode->next;
                        $currentNode->next->prev = $previous;
                    }

                    $this->totalNode--;

                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function displayForward()
    {
        echo "Total Lists:", $this->totalNode, PHP_EOL;

        $currentNode = $this->firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data, PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }

    public function displayBackward()
    {
        echo "Total Lists:", $this->totalNode, PHP_EOL;

        $currentNode = $this->lastNode;
        while ($currentNode !== null) {
            echo  $currentNode->data, PHP_EOL;

            $currentNode = $currentNode->prev;
        }
    }
}