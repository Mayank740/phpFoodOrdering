<?php
session_start();
$con = mysqli_connect('35.186.157.176','root','Shadegame1');
mysqli_select_db($con, 'fooditemdb');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rev2.css">
    <!-- css link -->
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
    <title>reviews</title>
</head>
<body>
<nav>
		<div class="logo">
			<h4>LOGO</h4>
		</div>
		<ul class="nav-links">
			<li>
				<a href="ali.php" class="active" name="nav">Home</a>
			</li>
			<li>
				<a href="#about">About</a>
			</li>
			<li>
				<a href="#about">Contact</a>
			</li>
			<li>
				<a href="Reviews.php" class="">Review</a>
			</li>
			<li>
				<a href="login_registration.php" class="login">Login/Register</a> 
			</li>
		</ul>
	</nav>
    <div class="center">
<div class="container">
	<div class="cards">
    <?php
            $s = " select * from review";
            $result = mysqli_query($con, $s);
            $n=0;
            while($row = mysqli_fetch_assoc($result)){
                $n=$n+1;
                $name=$row['name'];
                $review=$row['review'];
                $order_id=$row['order_id'];
                $s = "select fooditem_name,fooditem_image from fooditemttb where id = ANY (select oid from history where order_id='$order_id')";
                $result1 = mysqli_query($con, $s);
                $row1=mysqli_fetch_assoc($result1);
                $fooditem_name=$row1['fooditem_name'];
                $fooditem_image=$row1['fooditem_image'];
    ?>    
    <a class="card" href="#">
			<span class="card-header" style="background-image: url(<?=$fooditem_image?>);">
				<span class="card-title">
					<h3><?=$n?>.<?=$fooditem_name?></h3>
				</span>
			</span>
			<span class="card-summary">
				<?=$review?>
			</span>
			<span class="card-meta">
				User:<?=$name?>
			</span>
        </a>
    <?php
            }
    ?>    
	</div>
</div>
</div>

</body>
</html>