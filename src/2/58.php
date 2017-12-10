<?php

// Khởi tạo mảng có khóa là chuỗi
$meal = array(
	'breakfast' => 'Walnut Bun',
	'lunch'     => 'Cashew Nuts and White Mushrooms',
	'dinner'    => 'Eggplant with Chili Sauce'
);

?>
<table border="1">
	<?php
    // Dùng vòng lặp foreach để in ra bảng từ mảng $meal
	foreach ( $meal as $key => $value ) {
		?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
        </tr>
		<?php
	}
	?>
</table>
