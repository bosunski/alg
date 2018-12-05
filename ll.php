<?php
class ListNode
{
	public $data = null;
	public $next = null;

	/**
	 * ListNode constructor.
	 *
	 * @param string $data
	 */
	public function __construct(string $data)
	{
		$this->data = $data;
	}
}

class LinkedList {
	private $firstNode = null;
	private $totalNode = null;

	public function insert(string $data = null)
	{
		$newNode = new ListNode($data);

		if ($this->firstNode === null) {
			$this->firstNode = &$newNode;
		} else {
			$currentNode = $this->firstNode;
			while ($currentNode->next !== null) {
				$currentNode = $currentNode->next;
			}
			$currentNode->next = $newNode;
		}

		$this->totalNode++;

		return true;
	}

	public function display()
	{
		echo "Total book titles: " . $this->totalNode , PHP_EOL;

		$currentNode = $this->firstNode;
		while ($currentNode !== null) {
			echo $currentNode->data . PHP_EOL;
			$currentNode = $currentNode->next;
		}
	}
}

$bookTitles = new LinkedList;
$bookTitles->insert('Intro to CS');
$bookTitles->insert('Intro to PHP');
$bookTitles->insert('Intro to Java');
$bookTitles->display();