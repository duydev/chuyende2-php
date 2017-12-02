<?php
// Gán giá trị cho $a, $b
$a = 1;
$b = 2;

// Khai báo hàm tính tổng của $a và $b
function Sum() {
	// Khai báo $a, $b là biến toàn cục
	global $a, $b;

	// Gán giá trị mới cho $b là tổng của $a và $b
	$b = $a + $b;
}

// Gọi hàm Sum
Sum();

// In ra kết quả của $b sau khi gọi hàm. Lúc này $b = 3
echo $b;