<?php
session_start();
require_once('eligible.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Bootstrap Link -->
	<!-- <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!-- css link -->
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="style.css">
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

	<div style="top: 8vh;">
		<img src="images/wallpaper.jpg" class="resp" width="100%" height="690px">
		<div class="centered">
			<b>Are you hungry?</b><br>
			<p>Don't wait!!!</p>
			<p>Let start to order food now!</p>
			<a href="index.php">
            <button class="btn-primary" style="font-size: 1.6vw; height: 40px; background-color: #008CBA;">CHECKOUT MENU</button></a>
		</div>
	</div>


	<?php
if(isset($_SESSION['username']))
{
?>
   <div class="order-grid">
   <h4>Recent Orders:</h4>
   <?php
   $name=$_SESSION['username'];
   $con = mysqli_connect('35.186.157.176','root','Shadegame1');
   mysqli_select_db($con, 'fooditemdb');
   $s="select * from (select * from history where name = '$name' order by id DESC LIMIT 10)V order by id ASC";
   $result=mysqli_query($con,$s);
   while($row=mysqli_fetch_assoc($result))
   {
	   	$order_id=$row['order_id'];
	   	$fooditemid=$row['oid'];
	   	$s="select * from fooditemttb where id=$fooditemid";
		$res=mysqli_query($con,$s);
		$food=mysqli_fetch_assoc($res);
		$fooditemname=$food['fooditem_name'];
		$fooditemimg=$food['fooditem_image'];
	echo "
	<form action='yourreview.php' name=\"foodform\" id='foodform' method=\"post\" class=\"cart-items\">
					   <div class=\"row bg-white\">
						   <div class=\"col-md-3\">
							   <img src='$fooditemimg' alt=\"image 1\" class=\"img-thumbnail\">
						   </div>
						   <div class=\"col-md-3 itemname\">
							   <h3 class=\"pt-2\">$fooditemname</h3>
                        <small class=\"text-secondary\">Seller:dailytuition</small>
                        <hr>
                     </div>
                     <input type='hidden' name='orderid' value='$order_id'/>
                     <div class=\"col-md-3 py-5\">";
                       
                        if(!$row['reviewed']==0)
                        {
                        echo "
                        <input type='submit' class=\"btn btn-primary py-4 btn-block\" disabled='true' value='Reviewed'";
                        } 
                        else{
                           echo "
                           <input type='submit' class=\"btn btn-danger py-4 btn-block\" value='Review' ";
                        }
                        echo ">
                     </div>
					   </div>
			   </form>
   ";

   }
   ?>
   </div>
<?php
}
?>


<footer>
                <div class="container-fluid">
                   <!-- back to top -->
                   <div class="row top text-center">
                     <a href="#nav" style="text-decoration: none; color: white; padding-right: 600px;">
                      <i class="fa fa-chevron-circle-up" aria-hidden="true"> &nbsp;Back to top</i>
                      </a>
                   </div>
                   <!-- Follow us, About and Contact -->
                   <div class="row about">
                      <!-- Follow us -->
                      <div class="col-lg-4">
                         <a name="about"></a>
                         <p class="text-center">Follow Us</p>
                         <p class="text-center" style="font-size: 10px; color: #808080;">Let us be social</p>
                         <div class="icons">
                         <i class="fa fa-facebook" aria-hidden="true" style="color: white; margin-left: 99px;"></i>
                         <i class="fa fa-instagram" aria-hidden="true" style="color: white;"></i>
                         <i class="fa fa-twitter" aria-hidden="true" style="color: white;"></i>
                         <i class="fa fa-linkedin" aria-hidden="true" style="color: white;"></i>
                      </div>
                         <!-- <div class="border"></div> -->
                      </div>
                      <!-- about -->
                      <div class="col-lg-4 about">
                         <p class="text-center" style="margin-top: -8px;">About</p>
                         <!-- <div class="border"></div> -->
                      </div>
                      <!-- contact -->
                      <div class="col-lg-4">
                      <p class="text-center">Quick Contact</p>
                      <i class="fa fa-phone" aria-hidden="true" style="color: white; font-size: 12px; padding: 10px 0px 0px 140px;"> &nbsp; 1800 123 5555</i><br>
                      <i class="fa fa-envelope" aria-hidden="true" style="color: white; font-size: 12px; padding: 15px 0px 0px 140px;"> &nbsp;customercare@travelo.com</i>
                   </div>
                   </div>
                   <!-- footer -->
                   <div class="row foot">
                      <p>All rights reserved &copy 2020</p>
                   </div>
                </div>
             </footer>
</body>
</html>