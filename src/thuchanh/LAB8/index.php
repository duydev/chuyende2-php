<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LAB 8</title>
	<style>
		table { border: 1px solid #000; }
		table td { border: 1px solid #000;  }
	</style>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Choose file for upload:</td>
				<td><input type="file" name="file[]" accept="*.jpg,*.png,*.jpeg" multiple></td>
				<td><button type="submit">Submit</button></td>
			</tr>
		</table>
		<br>
		<?php 
		if( ! empty( $_FILES['file'] ) ) {
			$files = $_FILES['file'];
			$num_files = count( $files['name'] );
			for( $i = 0; $i < $num_files; $i++ ) {
			?>
				<h2>File Information</h2>
				<p>Name: <?php echo $files['name'][$i]; ?></p>
				<p>Type: <?php echo $files['type'][$i]; ?></p>
				<p>Temp Name: <?php echo $files['tmp_name'][$i]; ?></p>
				<p>Err No: <?php echo $files['error'][$i]; ?></p>
				<p>Size: <?php echo $files['size'][$i]; ?></p>
				<?php
				if( ! empty( $files['error'][$i] ) ) {
					print_r( error_get_last() );
				} else {
					if( move_uploaded_file( $files['tmp_name'][$i] , 'upload/'. $files['name'][$i] ) ) {
						?>
						<b>Upload thành công.</b>
						<?php
					} else {
						?>
						<b>Upload thất bại.</b>
						<?php
					}				
				}
			}
		}
		?>
	</form>
</body>
</html>