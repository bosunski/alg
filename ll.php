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

	public function insertBefore(string $data = null, string $query = null)
	{
		$newNode = new ListNode($data);

		if ($this->firstNode) {
			$previous = null;
			$currentNode = $this->firstNode;
			while ($currentNode !== null) {
				if ($currentNode->data === $query) {
					$newNode->next = $currentNode;
					$previous->next = $newNode;
					$this->totalNode++;

					break;
				}

				$previous = $currentNode;
				$currentNode = $currentNode->next;
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

					$currentNode->next = $newNode;
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
		if ($this->firstNode !== null) {
			$currentNode = $this->firstNode;

			if ($currentNode->next === null) {
				$this->firstNode = null;
			} else {
				$previousNode = null;

				while ($currentNode->next !== null) {
					$previousNode = $currentNode;
					$currentNode = $currentNode->next;
				}

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
			$previousNode = null;
			$currentNode = $this->firstNode;
			while ($currentNode !== null) {
				if ($currentNode->data === $query) {
					if ($currentNode->next === null) {
						$previousNode->next = null;
					} else {
						$previousNode->next = $currentNode;
					}

					$this->totalNode--;
					break;
				}

				$previousNode = $currentNode;
				$currentNode = $currentNode->next;
			}
		}
	}

	public function reverse()
	{
		if ($this->firstNode !== null) {
			if ($this->firstNode->next !== null) {
				$reversedList = null;
				$next = null;
				$currentNode = $this->firstNode;
				while ($currentNode !== null) {
					$next = $currentNode->next;
					$currentNode->next = $reversedList;
					$reversedList = $currentNode;
					$currentNode = $next;
				}

				$this->firstNode = $reversedList;
			}
		}
	}

	public function getNthNode(int $n = 0)
	{
		$count = 1;
		if ($this->firstNode !== null) {
			$currentNode = $this->firstNode;
			while ($currentNode !== null) {
				if ($count === $n) {
					return $currentNode;
				}

				$count++;
				$currentNode = $currentNode->next;
			}
		}
	}
}


$bookTitles = new LinkedList;
$bookTitles->insert('Intro to CS');
$bookTitles->insert('Intro to PHP');
$bookTitles->insert('Intro to Java');
$bookTitles->display();

