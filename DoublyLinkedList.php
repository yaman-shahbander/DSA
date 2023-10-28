<?php

class Node
{
	public $value;
	public $prev;
	public $next;

	public function __construct()
	{
		$this->value = null;
		$this->prev = null; 
		$this->next = null;
	}
}

class DoublyLinkedList
{
	private Node $head;
	private Node $tail;
	private $length;

	public function __construct()
	{
		$this->length = 0;
	}

	public function isEmpty()
	{
		return $this->length === 0 ? true : false;
	}

	public function insertFirst($element)
	{
		$node = new Node();
		$node->value = $element;

		if ($this->isEmpty()) {
			$node->prev = $node->next = null;
			$this->head = $this->tail = $node;
		} else {
			$node->next = $this->head;
			$node->prev = null;
			$this->head->prev = $node;
			$this->head = $node;
		}
		$this->length++;
	}

	public function insertLast($element)
	{
		$node = new Node();
		$node->value = $element;

		if ($this->isEmpty()) {
			$node->prev = $node->next = null;
			$this->head = $this->tail = $node;
		} else {
			$node->next = null;
			$node->prev = $this->tail;
			$this->tail->next = $node;
			$this->tail = $node;			
		}
		$this->length++;
	}

	public function insertAt($index, $element)
	{
		if ($index < 0 || $index > $this->length) return false;
		if ($index === 0) $this->insertFirst($element);
		elseif ($index === $this->length) $this->insertLast($element);
		else {
			$node = new Node();
			$node->value = $element;
			$current = $this->head;
			for ($i = 1; $i < $index; $i++) $current = $current->next; 
			$next = $current->next;
			$node->next = $current->next;
			$node->prev = $current;
			$current->next = $node;
			$next->prev = $node;
			$this->length++;
		}
	}

	public function removeFirst()
	{
		if ($this->isEmpty()) return false;
		elseif ($this->length === 1) $this->head = $this->tail = null;
		else {
			$this->head = $this->head->next;
			$this->head->prev = null;
		}
		$this->length--;
	}

	public function removeLast()
	{
		if ($this->isEmpty()) return false;
		elseif ($this->length === 1) $this->head = $this->tail = null;
		else {
			$this->tail = $this->tail->prev;
			$this->tail->next = null;
		}
		$this->length--;
	}

	public function removeElement($element)
	{
		if ($this->isEmpty()) return false;
		elseif ($this->head->value === $element) $this->removeFirst();
		elseif ($this->tail->value === $element) $this->removeLast();
		else {
			$current = $this->head->next;
			while ($current != null && $current->value != $element) $current = $current->next;
			if ($current === null) return false;
			$prev = $current->prev;
			$next = $current->next;
			$prev->next = $next;
			$next->prev = $prev;
			$this->length--;
		}
	}

	public function removeAt($index)
	{
		if ($index < 0 || $index > $this->length) return false;
		elseif ($this->isEmpty()) return false;
		elseif ($index === 0) $this->removeFirst();
		elseif ($index === $this->length) $this->removeLast();
		else {
			$current = $this->head;
			for ($i = 1; $i <= $index; $i++) $current = $current->next;
			$prev = $current->prev;
			$next = $current->next;
			$prev->next = $next;
			$next->prev = $prev;
			$this->length--;
		}
	}

	public function display()
	{
		$current = $this->head;
		while ($current != null)
		{
			echo $current->value . " ";
			$current = $current->next;
		}
	}

	public function reverseDisplay()
	{
		$current = $this->tail;
		while ($current != null) {
			echo $current->value . " ";
			$current = $current->prev;
		}
	}
}

$doublyLinkedList = new DoublyLinkedList();
$doublyLinkedList->insertFirst(1);
$doublyLinkedList->insertAt(1, 2);
$doublyLinkedList->insertAt(2, 3);
$doublyLinkedList->insertAt(3, 4);
$doublyLinkedList->insertAt(4, 5);
$doublyLinkedList->insertAt(5, 7);
$doublyLinkedList->insertAt(6, 8);
$doublyLinkedList->insertAt(7, 9);
$doublyLinkedList->insertLast(10);
$doublyLinkedList->removeFirst();
$doublyLinkedList->removeLast();
$doublyLinkedList->removeElement(5);
$doublyLinkedList->removeAt(3);
$doublyLinkedList->display();
