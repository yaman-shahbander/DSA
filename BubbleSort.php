<?php

$array = [6, 5, 3, 1, 8, 7, 2, 4];

function bubbleSort($arr)
{
	$length = count($arr);

	for ($i = 0; $i < $length; $i++) {
		for ($j = 0; $j < $length - $i - 1; $j++) {
			if ($arr[$j] > $arr[$j + 1]) {
				$temp = $arr[$j];
				$arr[$j] = $arr[$j + 1];
				$arr[$j + 1] = $temp;
			}
		}
	}

	return $arr;
}

print_r(bubbleSort($array));
