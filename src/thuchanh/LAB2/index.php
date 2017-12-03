<?php 
require_once 'userclass.php';
require_once 'employeeclass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LAB 2</title>
</head>
<body>
	<div id="wrapper">
		<?php 
		$users = [
			['Somebody','somebody@mail.com'],
			['No One','noone@mail.com'],
		];

		foreach ( $users as $user ) {
			$user = new user( $user[0], $user[1] );
			?>
				<h2>-- User Info --</h2>
				<div>User ID: <?php echo $user->getUserID(); ?></div>
				<div>UserName: <?php echo $user->getUserName(); ?></div>
			<?php
		}

		$person = new Person( 'Jack', 111 );
		?>
			<h2>-- More OOP PHP --</h2>
			<div>Person Name: <?php echo $person->getName(); ?></div>
			<div>Person ID: <?php echo $person->getNationID(); ?></div>
			<br>
			<h2>Employee</h2>
		<?php
		$employees = [
			['Somebody','somebody@mail.com','Security'],
			['No One','noone@mail.com','Offical'],
		];
		$num_emp = count( $employees );

		foreach ( $employees as $i => $employee ) {
			$obj = new Employee( $employee[0], $employee[1], $employee[2] );
			?>
			<div>Employee ID: <?php echo $obj->getEmployeeID(); ?></div>
			<div>Employee Name: <?php echo $obj->getName(); ?></div>
			<div>Employee Department: <?php echo $obj->getDepartment(); ?></div>
			<?php
			if( $i + 1 < $num_emp  ) {
				?>
				<br>
				<h2>More Employee</h2>
				<?php
			}
		}
		?>
	</div>
</body>
</html>