<?php
session_start();
if(!isset($_POST))
{
    header('location:ali.php');
}
$name=$_SESSION['username'];
$order_id=$_POST['orderid'];
$feedback_text=$_POST['feedback_text'];
$con = mysqli_connect('35.186.157.176','root','Shadegame1');
mysqli_select_db($con, 'fooditemdb');
$s="insert into review(order_id,review,name) values ('$order_id','$feedback_text','$name')";
mysqli_query($con,$s);
$s1="UPDATE history SET reviewed=1 WHERE order_id='$order_id'";
$k=mysqli_query($con,$s1);
header('location:ali.php');
print_r($s1);
?>