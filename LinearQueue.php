<?php

class Queue
{
	private $front;
	private $rear;
	private $queue;

	public function __construct()
	{
		$this->front = -1;
		$this->rear = -1;
		$this->queue = [];
	}

	public function isEmpty()
	{
		$this->front === $this->rear ? true : false;
	}

	public function size()
	{
		return $this->rear - $this->front;
	}

	public function enqueue($element)
	{
		return $this->queue[++$this->rear] = $element;
	}

	public function dequeue()
	{
		if ($this->isEmpty()) return false;

		return $this->queue[++$this->front];
	}

	public function front()
	{
		if ($this->isEmpty()) return false;

		return $this->queue[++$this->front];
	}

	public function rear()
	{
		if ($this->isEmpty()) return false;

		return $this->queue[$this->rear];
	}
}

$queue = new Queue();
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->enqueue(40);
$queue->enqueue(50);
echo $queue->front() . PHP_EOL;
echo $queue->rear();
