<?php
if( isset( $_GET['keyword'] ) ) {
	$keyword = $_GET['keyword'];
	echo "Từ khóa bạn nhập là $keyword";
} else {
	echo 'Không có từ khóa tìm kiếm.';
}