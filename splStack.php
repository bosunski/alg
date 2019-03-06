<?php

$books = new SplStack();
$books->push("Introduction to PHP7");
$books->push("mastering JavaScript.");
$books->push("MySQL Workbench tutorial.");

echo  $books->pop(), PHP_EOL;
echo $books->top(), PHP_EOL;
