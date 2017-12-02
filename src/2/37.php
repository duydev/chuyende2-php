<?php
// Khai báo và gán giá trị cho biến $var
$var = 'test';

// Kiểm tra xem biến var có tồn tại.
if( isset( $var ) ) echo 'Variable is Set.';

// Kiểm tra xem biến var có tồn tại và có bị rỗng không.
if( empty( $var ) ) echo 'Variable is Empty.';