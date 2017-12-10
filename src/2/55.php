<?php

// Khai báo $menu
$menu = 3;

// Kiểm tra menu nào được chọn và in ra thông báo
switch ( $menu ) {
	case 1:
		echo 'You picked one';
		break;
	case 2:
		echo 'You picked two';
		break;
	case 3:
		echo 'You picked three';
		break;
	case 4:
		echo 'You picked four';
		break;
	default:
		echo 'You picked another option';
}