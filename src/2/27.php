<?php
// Gán giá trị cho 2 biến $a và $b
$a = 1;
$b = 2;

// Khai báo hàm Sum để tính tổng của $a và $b
function Sum() {
	// Dùng mảng GLOGBALS để lấy trị $a và $b như biến toàn cục.
	// Gán lại cho $b tổng của $a + $b
	$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

// Thực thi hàm Sum
Sum();

// In kết quả $b sau khi gọi hàm. Lúc này $b = 3
echo $b;