<?php
    session_start();
    if(isset($_SESSION['cart']))
    {
        $con = mysqli_connect('35.186.157.176','root','Shadegame1');
        mysqli_select_db($con, 'fooditemdb');
        $name=$_SESSION['username']; 
        $fooditem = array_column($_SESSION['cart'],null);
        foreach ($fooditem as $id) {
            $g=$id['fooditem_id'];
            $qty=$id['qty'];
            $s = "insert into liveorders(name , id, qty) values('$name','$g','$qty')";
            mysqli_query($con, $s);
        }
        unset($_SESSION['cart']);
    }
    header('location:index.php');
?>