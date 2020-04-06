<?php
	session_start();
	//after registering it will redirect to the login_registration page
	header('location:login_registration.php');
	$con = mysqli_connect('35.186.157.176','root','Shadegame1');

	mysqli_select_db($con, 'food_ordering');

	$name = $_POST['user'];
	$pass = $_POST['password'];

	$s = " select * from registration where name = '$name'";
	$result = mysqli_query($con, $s);
	//it will count the number of rows where this name has already been taken
	$num = mysqli_num_rows($result);
	if($num == 1){
		echo "Username Already taken";
	}else{
		$reg = "insert into registration(name , password) values('$name','$pass')";
		mysqli_query($con, $reg);
		echo "Registration Successful";
	}
?>