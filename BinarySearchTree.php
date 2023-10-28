<?php

class Node
{
	public function __construct(
		public $value = null,
		public $left = null, 
		public $right = null
	) {}
}

class BST
{
	public Node $root;
	public function __construct() { $this->root = new Node(); }
	public function insert($value)
	{
	    $node = new Node($value);
	    if ($this->isEmpty()) $this->root = $node;
	    else {
	        $parent = $this->root;
	        $added = false;

	        while ($added != true) {
	            if ($node->value <= $parent->value) {
	                if ($parent->left === null) {
	                    $this->addLeftChild($node, $parent);
	                    $added = true;
	                } 
	                $parent = $parent->left;
	            } else {
	                if ($parent->right === null) {
	                    $this->addRightChild($node, $parent);
	                    $added = true;
	                } 
	                $parent = $parent->right;
	            }
	        }
	    }
	}

	public function lookUp($node, $value)
	{
	    if ($this->isEmpty()) return false;
	    if ($node->value === $value) return true;

	    $left = false; $right = false;
	    if ($node->left != null) $left = $this->lookUp($node->left, $value);
	    if ($node->right != null) $right = $this->lookUp($node->right, $value);

	    return $left || $right;
	}

	public function addLeftChild($child, $parent)
	{
		$parent->left = $child;
	}

	public function addRightChild($child, $parent)
	{
		$parent->right = $child;
	}

	public function isEmpty()
	{
		return $this->root->value === null;
	}

	public function breadthFirstSearch()
	{
		$currentNode = $this->root;
		$list = [];
		$queue = new SplQueue();
		$queue->enqueue($currentNode);
		while (!$queue->isEmpty())
		{
			$currentNode = $queue->dequeue();
			$list[] = $currentNode->value;
			if ($currentNode->left) $queue->enqueue($currentNode->left);
			if ($currentNode->right) $queue->enqueue($currentNode->right);
		}

		return $list;
	}

	public function preorder($node)
	{
		if ($node === null) return false;

		echo $node->value . PHP_EOL;
		$this->preorder($node->left);
		$this->preorder($node->right); 
	}

	public function inorder($node)
	{
		if ($node === null) return false;

		$this->inorder($node->left);
		echo $node->value . PHP_EOL;
		$this->inorder($node->right);
	}

	public function postorder($node)
	{
		if ($node === null) return false;

		$this->postorder($node->left);
		$this->postorder($node->right); 
		echo $node->value . PHP_EOL;
	}
}

$tree = new BST();
$tree->insert(9);
$tree->insert(4);
$tree->insert(6);
$tree->insert(20);
$tree->insert(170);
$tree->insert(15);
$tree->insert(1);
print_r($tree->inorder($tree->root));
