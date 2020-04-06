<?php
session_start();
require_once('eligible.php');
if($_SESSION['username']!="ali")
{
    header('location:index.php');
}
    $id=$_GET['o'];
    $con = mysqli_connect('35.186.157.176','root','Shadegame1');
    mysqli_select_db($con, 'fooditemdb');
    if(isset($_GET['o']))
    {
    $s = " select * from liveorders where order_id='$id'";
    $result = mysqli_query($con, $s);
    $row=mysqli_fetch_assoc($result);
    $order_id=$row['order_id'];
    $fid=$row['id'];
    $name=$row['name'];
    $ins = "insert into history(order_id,name,oid) values('$order_id','$name','$fid')";
    $k=mysqli_query($con, $ins);
    $s = " DELETE from liveorders where order_id='$order_id'";
    $result = mysqli_query($con, $s);
    echo $id;
    }
    else{
    $s = " select * from liveorders";
    $result = mysqli_query($con, $s);
    $num=mysqli_num_rows($result);
    $curr=$_GET['num'];
    if($num>$curr)
    {
        echo '0';
    }
    else echo '1';
    }
?>