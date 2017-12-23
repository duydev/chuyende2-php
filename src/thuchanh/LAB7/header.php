<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
</head>
<body>
	<div id="wrapper">
		<header>
			<div class="container">
				<h2>Project trainning - Xây dựng Website bán hàng</h2>
				<?php 
				if( ! empty( $_SESSION['user'] ) ) {
					?>
					<h3>Xin chào <?php echo $_SESSION['user']; ?> | <a href="./logout.php">Đăng xuất</a></h3>
					<?php
				} else {
					?>
					<h3>Bạn chưa đăng nhập. <a href="./login.php">Đăng nhập</a> - <a href="./register.php">Đăng ký</a></h3>
					<?php
				}
				?>
				<nav class="navbar navbar-default">
				   <div class="container-fluid">
				      <!-- Brand and toggle get grouped for better mobile display -->
				      <div class="navbar-header">
				         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				         <span class="sr-only">Toggle navigation</span>
				         <span class="icon-bar"></span>
				         <span class="icon-bar"></span>
				         <span class="icon-bar"></span>
				         </button>
				      </div>
				      <!-- Collect the nav links, forms, and other content for toggling -->
				      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				         
				         <ul class="nav navbar-nav">
				            <li><a href="./list_product.php">Danh sách sản phẩm</a></li>
		                    <li><a href="./add_product.php">Thêm sán phẩm</a></li>
				         </ul>
				        
				      </div>
				      <!-- /.navbar-collapse -->
				   </div>
				   <!-- /.container-fluid -->
				</nav>
			</div>	
		</header>
		<div class="container">