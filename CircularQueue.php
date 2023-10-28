<?php

class CircularQueue
{
	private $front;
	private $rear;
	private $queue;
	private $size;
	private $count;

	public function __construct($size)
	{
		$this->size = $size;
		$this->front = -1;
		$this->rear =  -1;
		$this->queue = [];
		$this->count = 0;
	}

	public function isEmpty()
	{
		return $this->front === -1 && $this->rear === -1 ? true : false;
	}

	public function isFull()
	{
		return $this->count === $this->size ? true : false;
	}

	public function enqueue($element)
	{
		if ($this->isFull()) return false;
		elseif ($this->isEmpty()) $this->front = $this->rear = 0;
		else $this->rear = ($this->rear + 1) % $this->size;

		$this->count++;
		$this->queue[$this->rear] = $element;
	}

	public function dequeue()
	{
		if ($this->isEmpty()) return false;
		elseif ($this->front === $this->rear) $this->front = $this->rear = -1;

		$this->front = ($this->front + 1) % $this->size; 
	}

	public function front()
	{
		if ($this->isEmpty()) return false;

		return $this->queue[$this->front];
	}

	public function rear()
	{
		if ($this->isEmpty()) return false;

		return $this->queue[$this->rear];
	}
}

$circularQueue = new CircularQueue(5);
$circularQueue->enqueue(10);
$circularQueue->enqueue(20);
$circularQueue->enqueue(30);
$circularQueue->enqueue(40);
$circularQueue->enqueue(50);
echo $circularQueue->front() . PHP_EOL;
echo $circularQueue->rear();
