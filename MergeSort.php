<?php

$array = [6, 5, 3, 1, 8, 7, 2, 4];

function mergeSort($arr)
{
	$length = count($arr);
	if ($length === 1) return $arr;

	$middle = floor($length / 2);
	$left = array_slice($arr, 0, $middle);
	$right = array_slice($arr, $middle, $length);

	return merge(
		mergeSort($left),
		mergeSort($right)
	);
}

function merge($left, $right)
{
	$leftIndex = 0; $rightIndex = 0; $result = [];
	while ($leftIndex < count($left) && $rightIndex < count($right))
	{
		if ($left[$leftIndex] < $right[$rightIndex]) {
			array_push($result, $left[$leftIndex]);
			$leftIndex++;
		} else {
			array_push($result, $right[$rightIndex]);
			$rightIndex++;
		}
	}

	$result = array_merge($result, array_slice($left, $leftIndex));
	$result = array_merge($result, array_slice($right, $rightIndex));

	return $result;
}

print_r(mergeSort($array));
