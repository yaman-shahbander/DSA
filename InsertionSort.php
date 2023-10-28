<?php

$array = [6, 5, 3, 1, 8, 7, 2, 4];

function insertionSort($arr)
{
	$length = count($arr);

	for ($i = 0; $i < $length; $i++) {
		$value = $arr[$i];
		$j = $i - 1;
		while ($j >= 0 && $arr[$j] > $value) {
			$arr[$j + 1] = $arr[$j];
			$j--;
		}
		$arr[$j + 1] = $value;
	}

	return $arr;
}

print_r(insertionSort($array));
