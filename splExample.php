<?php

$bookTitles = new SplDoublyLinkedList();

$bookTitles->push("Introduction to Algorithm");
$bookTitles->push("Introduction to PHP and Data structures");
$bookTitles->push("Programming Intelligence");
$bookTitles->push("Mediawiki Administrative tutorial Guide");
$bookTitles->add(1, "Introduction to Calculus");
$bookTitles->add(3, "Introduction to Graph Theory");

for ($bookTitles->rewind(); $bookTitles->valid(); $bookTitles->next()) {
    echo $bookTitles->current(), PHP_EOL;
}