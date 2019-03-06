<?php

interface QueueInterface
{
    public function enqueue(string $item): void;

    public function dequeue();

    public function peek();

    public function isEmpty(): bool;
}