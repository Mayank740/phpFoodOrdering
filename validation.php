<?php
	session_start();
	
	$con = mysqli_connect('35.186.157.176','root','Shadegame1');

	mysqli_select_db($con, 'food_ordering');

	$name = $_POST['user'];
	$pass = $_POST['password'];

	$s = " select * from registration where name = '$name' && password = '$pass'";
	$result = mysqli_query($con, $s);
	//it will count the number of rows where this name has already been taken
	$num = mysqli_num_rows($result);
	if($num == 1){
		$_SESSION['username'] = $name;
		/**************load data into $_SESSION['cart'] from cartttb here 
		 USE $_SESSION['username'] to query into cartttb for all details
		*/

											$s = " select * from cartttb where name = '$name'";
											$result = mysqli_query($con, $s);
											$item_array=array();
											$count = count($_SESSION['cart']);
											while($row = mysqli_fetch_assoc($result)){
												$item_array[$count]=array('fooditem_id' =>$row['id']);
												$count=$count+1;
											}
											$_SESSION['cart'] = $item_array;
											$s = " DELETE from cartttb where name='$name'";
											$result = mysqli_query($con, $s);



		header('location:admin.php');
	}
	else{
		header('location:login_registration.php');
	}
?>