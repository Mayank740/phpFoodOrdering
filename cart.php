<?php
	session_start();

	//to check if user is logged in
	require_once('eligible.php');
	
	require_once("php/CreateDb.php");
	require_once("php/component.php");

	$db = new CreateDb("fooditemdb","fooditemttb");

	if(isset($_POST['remove'])){
		if($_GET['action']=='remove'){
			foreach ($_SESSION['cart'] as $key => $value) {
				if($value["fooditem_id"]==$_GET['id']){
					unset($_SESSION['cart'][$key]);
					echo "<script>alert('Product has been Removed....!</script>";
					echo "<script>window.location='cart.php</script>";
					
				}
			}
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<!-- css link -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--<link rel="stylesheet" type="text/css" href="css/index_style.css"> -->
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body class="bg-light">

	<!-- <?php
		//require_once('php/header.php');
	?> -->

	<header>
		<nav>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2 logo text-center" >
						<h4>LOGO</h4>
					</div>
					<div class="col-lg-4"></div>
					<div class="col-lg-6">
						<ul>
						    <li>
							    <a href="index.php" name="nav">Menu</a>
							<li>
								<a href="ali.php" name="nav">Home</a>
							</li>
							<li>
								<a href="#about">About</a>
							</li>
							<li>
								<a href="#contact">Contact</a>
							</li>
							<li>
								<a href="Reviews.php">Review</a>
							</li>
							<!-- <li>
								<a href="cart.php" class="nav-item active nav-link">
								<h5 class="px-3 cart">
								<i class="fas fa-shopping-cart"></i>Cart 
						<?php
							if(isset($_SESSION['cart'])){
								$count = count($_SESSION['cart']);
								echo"<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
							}else{
								echo"<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";	
							}
						?>
					</h5>
				</a>
							</li> -->
							<li>
								<i class="fa fa-user-circle-o" aria-hidden="true" style="color: white; font-size: 18px;"> &nbsp;<?php echo $_SESSION['username']; ?></i>
								<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
			    				<span class="caret"></span></button>
			    				<ul class="dropdown-menu">
			      					<li><a href="logout.php">Logout</a></li>
			    				</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div class="container-fluid">
		<div class="row px-5">
			<div class="col-md-7">
				<div class="shopping-cart">
					<h6>My Cart</h6>
					<hr>
					<!-- copy and paste in component.php -->
					<!-- <form action="cart.php" method="get" class="cart-items">
						<div class="border rounded">
							<div class="row bg-white">
								<div class="col-md-3">
									<img src="./upload/product1.jpeg" alt="image 1" class="img-fluid">
								</div>
								<div class="col-md-6">
									<h5 class="pt-2">Product 1</h5>
									<small class="text-secondary">Seller:dailytuition</small>
									<h5 class="pt-2">$599</h5>
									<button type="submit" class="btn btn-warning">Save for Later</button>
									<button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
								</div>
								<div class="col-md-3 py-5">
									<div>
										<button type="button" class="btn bg-light border rounded-circle">
											<i class="fas fa-minus"></i>
										</button>
										<input type="text" value="1" class="form-control w-25 d-inline" name="">
										<button type="button" class="btn bg-light border rounded-circle">
											<i class="fas fa-plus"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form> -->
					<?php
					$total = 0;
                    	if(isset($_SESSION['cart'])){
                    		$fooditem = array_column($_SESSION['cart'],null);
                    	$result = $db->getData();
                    	while($row = mysqli_fetch_assoc($result)){
                    		foreach ($fooditem as $id) {
                    			if ($row['id']==$id['fooditem_id']) {
                    				//call the function
                    				cartElement($row['fooditem_image'],$row['fooditem_name'],$row['fooditem_price'],$row['id'],$id['qty']);
                    				$total = $total + (int)$row['fooditem_price']*(int)$id['qty'];
                    			}
                    		}
                    	}
                    }else{
                    	echo "<h5>Cart is Empty</h5>";
                    }
 
					?>
				</div>
			</div>


			<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 ">
				<div class="pt-4">
					<h6>PRICE DETAILS</h6>
					<hr>
					<div class="row price-details">				
						<div class="col-md-6">
							<?php
								if(isset($_SESSION['cart'])){
									$count = count($_SESSION['cart']);
									echo "<h6>Price($count items)</h6>";
								}else{
									echo "<h6>Price(0 items)</h6>";
								}
							?>
							<h6 class="c1">Delivery Charges</h6>
							<hr>
							<h6 class="c2">Amount Payable</h6>
						</div>
						<div class="col-md-6">
							<h6>$<?php echo $total ?></h6>
							<div class="c1"><h6 class="text-success">FREE</h6></div>
							<hr>
							<h6 class="c2">$<?php
								echo $total;
							?></h6>
						</div>
						<?php
						if(isset($_SESSION['cart'])&&@count($_SESSION['cart']>0))
						{
						?>
						<a class="checkout" href="checkout.php"><button class="btn-success border rounded checkout">Proceed to Checkout</button></a>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>