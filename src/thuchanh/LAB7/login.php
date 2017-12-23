<?php 
require_once 'header.php';

if( ! empty( $_SESSION['user'] ) ) {
	// case loged in
	header("Location: index.php");
}

require_once realpath( './entities/user.class.php' );

if( ! empty( $_POST ) ) {
	// case register form submitted
	$uname = ! empty( $_POST['txtname'] ) ? $_POST['txtname']: '';
	$upass = ! empty( $_POST['txtpass'] ) ? $_POST['txtpass']: '';

	$acc = new User();
	$res = $acc->checkLogin( $uname, $upass );
	if( $res && $res->num_rows > 0 ) {
		// case success
		$_SESSION['user'] = $uname;
		header("Location: index.php");
	} else {
		// case fail
		?>
		<div class="alert alert-danger">Có lỗi xảy ra, vui lòng kiểm tra dữ liệu.</div>
		<?php
	}
}
?>
	<form method="POST">
		<div class="form-group row">
			<label for="" class="col-sm-2 form-control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="txtname" id="" class="form-control" placeholder="Username" required="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-sm-2 form-control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="txtpass" id="" class="form-control" placeholder="Password" required="">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-offset-2 col-sm-10"><button type="submit">Login</button></div>
		</div>
	</form>
<?php require_once 'footer.php' ?>