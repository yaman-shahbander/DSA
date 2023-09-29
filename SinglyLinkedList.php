<?php

class Node
{
	public $value;
	public $next;

	public function __construct()
	{
		$this->value = null;
		$this->next = null;
	}
}

class LinkedList
{
	private Node $head;
	private Node $tail;
	private int $length;

	public function __construct()
	{
		$this->length = 0;
	}

	public function size()
	{
		return $this->length;
	}

	public function isEmpty()
	{
		return $this->length === 0;
	}

	public function insertFirst($element)
	{
		$node = new Node();
		$node->value = $element;

		if ($this->isEmpty())
		{
			$this->head = $this->tail = $node;
			$node->next = null;
		} else {
			$node->next = $this->head;
			$this->head = $node;
		}
		$this->length++;
	}

	public function insertLast($element)
	{
		$node = new Node();
		$node->value = $element;

		if ($this->isEmpty())
		{
			$this->head = $this->tail = $node;
			$node->next = null;
		} else {
			$node->next = null;
			$this->tail->next = $node;
			$this->tail = $node;
		}
		$this->length++;
	}

	public function insertAt($index, $element)
	{
		if ($index < 0 || $index > $this->length) return false;
		else {
			if ($this->isEmpty()) $this->insertFirst($element);
			elseif ($index === $this->length) $this->insertLast($element);
			else {
				$node = new Node();
				$node->value = $element;
				$current = $this->head;
				for ($i = 1; $i < $index; $i++) $current = $current->next;
				$node->next = $current->next;
				$current->next = $node;
				$this->length++;
			}
		}
	}

	public function removeFirst()
	{
		if ($this->isEmpty()) return false;
		elseif ($this->length === 1) {
			$this->head->value = $this->tail->value = null;
			$this->head->next = $this->tail->next = null;
		}
		else $this->head = $this->head->next;
		
		$this->length--;
	}

	public function removeLast()
	{
		if ($this->isEmpty()) return false;
		elseif ($this->length === 1) {
			$this->head->value = $this->tail->value = null;
			$this->head->next = $this->tail->next = null;
		}
		else {
			$current = $this->head->next;
			$prev = $this->head;
			while($current != $this->tail) {
				$prev = $current;
				$current = $current->next;
			}
			$prev->next = null;
			$this->tail = $prev;
		}
		$this->length--;
	}

	public function removeElement($element)
	{
		if ($this->isEmpty()) return false;
		if ($this->head->value === $element) $this->removeFirst();
		else {
			$prev = $this->head;
			$current = $this->head->next;
			while ($current != null && $current->value != $element)
			{
				$prev = $current;
				$current = $current->next;
			}
			if ($current === null) return false;
			else {
				$prev->next = $current->next;
				if ($current === $this->tail) $this->tail = $prev;
				$this->length--;
			}
		}
	}

	public function reverse()
	{
		$prev = null;
		$current = $this->head;
		$next = $current->next;
		while ($next != null)
		{
			$next = $current->next;
			$current->next = $prev;
			$prev = $current;
			$current = $next;
		}
		$this->tail = $this->head;
		$this->head = $prev;
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
}

$linkedList = new LinkedList();
$linkedList->insertFirst(10);
$linkedList->insertFirst(30);
$linkedList->insertFirst(40);
$linkedList->insertAt(1, 20);
$linkedList->insertLast(0);
$linkedList->removeFirst();
$linkedList->removeLast();
$linkedList->removeElement(30);
$linkedList->insertLast(50);
$linkedList->reverse();
$linkedList->display();
// output: 50 10 20
