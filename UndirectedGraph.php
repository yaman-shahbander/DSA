<?php

class Graph
{
	public function __construct(public int $numberOfNodes = 0, public array $adjacentList = []) {}

	public function addVertex($vertex)
	{
		$this->numberOfNodes++;
		$this->adjacentList[$vertex] = [];
	}

	public function addEdge($vertex1, $vertex2)
	{
		array_push($this->adjacentList[$vertex1], $vertex2);
		array_push($this->adjacentList[$vertex2], $vertex1);
	}

	public function showConnections()
	{
		foreach ($this->adjacentList as $key => $value) {
			echo $key . " --> " . implode(" ", $value) . PHP_EOL;
		}
	}
}

$graph = new Graph();
$graph->addVertex(0);
$graph->addVertex(1);
$graph->addVertex(2);
$graph->addVertex(3);
$graph->addVertex(4);
$graph->addVertex(5);
$graph->addVertex(6);
$graph->addEdge(3, 1);
$graph->addEdge(3, 4);
$graph->addEdge(4, 2);
$graph->addEdge(4, 5);
$graph->addEdge(1, 2);
$graph->addEdge(1, 0);
$graph->addEdge(0, 2);
$graph->addEdge(6, 5);
$graph->showConnections();
