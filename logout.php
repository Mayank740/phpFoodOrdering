<?php   
session_start();

$con = mysqli_connect('35.186.157.176','root','Shadegame1');

	mysqli_select_db($con, 'food_ordering');

	$name = $_SESSION['username'];

    $fooditem_id = array_column($_SESSION['cart'],'fooditem_id');

    foreach($fooditem_id as $id)
    {
        $reg = "insert into cartttb(name , id) values('$name','$id')";
        mysqli_query($con, $reg);
    }

unset($_SESSION);
session_destroy();
header("location: index.php");
exit();
?>