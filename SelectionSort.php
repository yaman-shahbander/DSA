<?php

$array = [6, 5, 3, 1, 8, 7, 2, 4];

function selectionSort($arr)
{
	$length = count($arr);

	for ($i = 0; $i < $length; $i++) {
		$min = $arr[$i];
		$index = $i;
		for ($j = $i; $j < $length; $j++) {
			if ($min > $arr[$j]) {
				$min = $arr[$j];
				$index = $j;
			}
		}
		$temp = $arr[$i];
		$arr[$i] = $min;
		$arr[$index] = $temp;
	}

	return $arr;
}

print_r(selectionSort($array));
