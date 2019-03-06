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


}