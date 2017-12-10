<?php

// Khai báo $i và $j
$i = 1;
$j = 9;

// Vòng lặp để sinh ra bảng cửu chương với $j
while ( $i <= 10 ) {
	$temp = $i * $j;
	echo "$j * $i = $temp<br>";
	$i ++;
}