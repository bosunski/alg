<?php

$agents = new SplQueue();

$agents->enqueue("Fred");
$agents->enqueue("John");
$agents->enqueue("Keith");
$agents->enqueue("Adiyan");
$agents->enqueue("Mikhael");

echo $agents->dequeue(), PHP_EOL;
echo $agents->dequeue(), PHP_EOL;
echo $agents->bottom(), PHP_EOL;