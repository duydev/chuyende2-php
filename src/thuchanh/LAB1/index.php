<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LAB 1</title>
	<link rel="stylesheet" type="text/css" href="./site.css"/>
</head>
<body>
	<div id="wrapper">
		<h2>Xếp loại kết quả tuyển sinh</h2>
		<form action="#" method="POST">
			<!-- Toán -->
			<div class="row">
				<div class="lbltitle">
					<label for="">Điểm môn Toán</label>
				</div>
				<div class="lblinput">
					<input type="number" name="toan" value="<?php echo isset( $_POST['toan'] ) ? $_POST['toan'] : '' ?>">
				</div>
			</div>
			<!-- Lý -->
			<div class="row">
				<div class="lbltitle">
					<label for="">Điểm môn Lý</label>
				</div>
				<div class="lblinput">
					<input type="number" name="ly" value="<?php echo isset( $_POST['ly'] ) ? $_POST['ly'] : '' ?>">
				</div>
			</div>
			<!-- Hóa -->
			<div class="row">
				<div class="lbltitle">
					<label for="">Điểm môn Hóa</label>
				</div>
				<div class="lblinput">
					<input type="number" name="hoa" value="<?php echo isset( $_POST['hoa'] ) ? $_POST['hoa'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<div class="lbltitle">
					<label for="">Chọn khu vực</label>
				</div>
				<div class="lblinput">
					<?php 
					$khuvuc = ['' => '--Chọn Khu Vực--'];
					for( $i = 1; $i<6; $i++ ) {
						$khuvuc[ $i ] = 'Khu vực ' . $i;
					}
					?>
					<select name="khuvuc" id="">
						<?php 
						foreach ( $khuvuc as $k => $v ) {
							$selected = '';
							if( isset( $_POST['khuvuc'] ) && $_POST['khuvuc'] == $k ) {
								$selected = 'selected';
							}
							?>
							<option value="<?php echo $k; ?>" <?php echo $selected; ?>><?php echo $v; ?></option>
							<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<input type="submit" value="Xếp loại" name="btnsubmit">
			</div>
			<div id="result">
				<h2>Kết quả xếp loại</h2>
				<div class="row">
					<div class="lbltitle">
						<label for="">Tổng điểm</label>
					</div>
					<div class="lbloutput">
						<?php 
						if( isset( $_POST['btnsubmit'] ) ) {
							$names = ['toan','ly','hoa'];
							$tong = 0;
							foreach ($names as $name) {
								if( isset( $_POST[ $name ] ) ) {
									$tong += floatval( $_POST[ $name ] );
								}
							}
							echo $tong;
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="lbltitle">
						<label for="">Xếp loại</label>
					</div>
					<div class="lbloutput">
						<?php 
						if( isset( $tong ) ) {
							if( $tong >= 24 ) {
								echo 'Giỏi';	
							} elseif( $tong >= 21 ) {
								echo 'Khá';
							} elseif( $tong >= 15 ) {
								echo 'Trung Bình';
							} else {
								echo 'Yếu';
							}
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="lbltitle">
						<label for="">Điểm ưu tiên</label>
					</div>
					<div class="lbloutput">
						<?php 
						if( isset( $tong ) && isset( $_POST['khuvuc'] ) ) {
							$khuvuc = intval( $_POST['khuvuc'] );
								if( $khuvuc == 3 ) {
									echo 3;
								} elseif( $khuvuc == 1 || $khuvuc == 2 ) {
									echo 5;
								} else {
									echo 0;
								}
						}
						?>
					</div>
				</div>
			</div>
		</form>
	</div>		
</body>
</html>