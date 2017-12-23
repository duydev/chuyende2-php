<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LAB 8</title>
	<style>
		table { border: 1px solid #000; }
	</style>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Choose file for upload:</td>
				<td><input type="file" name="file" id=""></td>
				<td><button type="submit">Submit</button></td>
			</tr>
		</table>
		<br>
		<?php 
		if( ! empty( $_FILES['file'] ) ) {
			$file = $_FILES['file'];
			?>
				<h2>File Information</h2>
				<p>Name: <?php echo $file['name']; ?></p>
				<p>Type: <?php echo $file['type']; ?></p>
				<p>Temp Name: <?php echo $file['tmp_name']; ?></p>
				<p>Err No: <?php echo $file['error']; ?></p>
				<p>Size: <?php echo $file['size']; ?></p>
				<?php
				if( ! empty( $file['error'] ) ) {
					print_r( error_get_last() );
				} else {
					if( move_uploaded_file( $file['tmp_name'] , 'upload/'. $file['name'] ) ) {
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
		?>
	</form>
</body>
</html>