<?php
session_start();
require_once('eligible.php');
if(!isset($_POST['orderid']))
{
    header('location:ali.php');
}
$order_id=$_POST['orderid'];
$name=$_SESSION['username'];
$con = mysqli_connect('35.186.157.176','root','Shadegame1');
mysqli_select_db($con, 'fooditemdb');
$s="select * from history where order_id='$order_id'";
$result=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($result);
$id=$row['oid'];
$s="select * from fooditemttb where id='$id'";
$result1=mysqli_query($con,$s);
$row1=mysqli_fetch_assoc($result1);
$ordernm=$row1['fooditem_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rev.css">
    <title>Document</title>
</head>
<body>
<div class="feedback">
  <h1>Review Order</h1>
  <form class="form" method="post" action="revsub.php" id="form1">
    <textarea name="feedback_text" maxlength="256" placeholder="Your feedback"></textarea>
    <input type="text" name="name" value="<?=$name?>" readonly/>
    <input type="text" name="orderid" id="orderid" value="<?=$order_id?>" readonly>
    <input type="text" name="ordernm" id="ordernm" value="<?=$ordernm?>" readonly>
    <button class="button small success radius" form="form1" type="submit" >Submit</button>
</form>
</div>

</body>
</html>