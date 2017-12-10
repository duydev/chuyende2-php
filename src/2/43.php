<?php

// Khai báo mảng
$dinner = array(
	'Sweet Corn and Asparagus',
	'Lemon Chicken',
	'Braised Bamboo Fungus'
);

// Gọi hàm sắp xếp mảng
sort($dinner);

// In output
echo "I want $dinner[0] and $dinner[1].<br>";

// Đếm số phần tử có trong mảng
$dishes = count($dinner);

echo $dishes;