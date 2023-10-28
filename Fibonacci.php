<?php

function fibonacciIterative($number)
{
	$arr = [0, 1];

	for ($i = 2; $i <= $number; $i++) {
		$arr[] = $arr[$i - 1] + $arr[$i - 2];
	}

	return $arr[$number];
}

function fibonacciRecursive($number)
{
	if ($number < 2) return $number;
	else return fibonacciRecursive($number - 1) + fibonacciRecursive($number - 2);
}

echo fibonacciRecursive(8) . " From fibonacciRecursive() function" . PHP_EOL;
echo fibonacciIterative(8) . " From fibonacciIterative() function" . PHP_EOL;
