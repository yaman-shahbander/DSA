<?php

class Stack
{
	private $top;
	private $stack = [];

	public function __construct()
	{
		$this->top = -1;
	}

	public function isEmpty()
	{
		if ($this->top === -1) return true;
		else return false;
	}

	public function size()
	{
		return $this->top + 1;
	}

	public function push($element)
	{
		return $this->stack[++$this->top] = $element;
	}

	public function pop()
	{
		if ($this->isEmpty()) return false;
		else return $this->stack[$this->top--];
	}

	public function peek()
	{
		if ($this->isEmpty()) return false;
		else return $this->stack[$this->top];
	}

	public function getElements()
	{
		if ($this->isEmpty()) return false;
		else for ($i = $this->size() - 1; $i >= 0; $i--)
				echo $this->stack[$i] . PHP_EOL;
	}
}

$s = new Stack();
$s->push(10);
$s->push(11);
$s->push(12);
$s->push(13);
$s->pop();
$s->push(14);
$s->getElements();
