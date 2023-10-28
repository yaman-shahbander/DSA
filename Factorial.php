<?php

function findFactorialRecursive($number)
{
	if ($number < 3) return $number;
	else return $number * findFactorialRecursive($number - 1); 
}

function findFactorialIterative($number)
{
	$s = 1;
	for ($i = $number; $i > 0; $i--) $s *= $i;
	return $s;
}

echo findFactorialIterative(6) . " From findFactorialIterative() function" . PHP_EOL;
echo findFactorialRecursive(6) . " From findFactorialRecursive() function";
