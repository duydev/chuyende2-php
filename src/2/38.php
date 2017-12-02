<?php

/** @var int $seed */
// Tạo một số ngẫu nhiên
// Hàm microtime với tham số là true sẽ trả về giá trị kiểu float thay vì string
// Do hàm srand nhận tham số là int nên $seed nên ép kiểu về int
$seed = intval( microtime( true ) * 100000000 );

// Khởi tạo random với số ngẫu nhiên sinh ra ở trên
srand( $seed );

// In ra một số ngẫu nhiên
echo rand(), '<br>';

// In ra một số ngẫu nhiên từ 1 -> 6
echo rand( 1, 6 ), '<br>';