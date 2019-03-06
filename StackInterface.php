<?php

/**
 * Interface Stack
 *
 * Access: O(n) - TC
 * Search: O(n) - TC
 * Space Complexity - O(n)
 */
interface Stack
{
    public function push(string $newItem);

    public function pop();

    public function top();

    public function isEmpty();
}