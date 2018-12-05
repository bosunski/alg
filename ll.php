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

class LinkedList
{
	/**
	 * @var ListNode
	 */
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

	public function insertAtFirst(string $data)
	{
		$newNode = new ListNode($data);
		if ($this->firstNode === null) {
			$this->firstNode = &$newNode;
		} else {
			// Create a copy of the first node
			$currentFirstNode = $this->firstNode;
			// Overwrite with the new Node
			$this->firstNode = &$newNode;
			// Assign the copy as the next of the new first node
			$newNode->next = $currentFirstNode;
		}

		$this->totalNode++;

		return true;
	}

	public function search(string $data = null)
	{
		if ($this->totalNode) {
			$currentNode = $this->firstNode;
			while ($currentNode !== null) {
				if ($currentNode->data === $data) {
					return $currentNode;
				}
				$currentNode = $currentNode->next;
			}
		}

		return false;
	}
}

$bookTitles = new LinkedList;
$bookTitles->insert('Intro to CS');
$bookTitles->insert('Intro to PHP');
$bookTitles->insert('Intro to Java');
$bookTitles->display();