<!-- on clicking add to cart button we want to store the details of that particular item in the session variable. So,we will create the session variable and store the id of the particualr product instead of storing the whole details of the product. So, using that id we can get the data from the database. So, to create the session variable, we first need to start the session  -->
<?php
	session_start();
	
	//to check if user is logged in
	require_once('eligible.php');
	require_once('php/CreateDb.php');
	require_once('./php/component.php');

	//create instance of CreateDb class
	$database = new CreateDb("fooditemdb","fooditemttb");

	if(isset($_POST['add'])){
		//print_r($_POST['product_id']);
		//now we want to store this id in session variable.So, 'cart' is the session variable were we will store the id
		if(isset($_SESSION['cart'])){
			//if 'cart' session variable is already set then if block will execute and it will print the value of id
			//print_r($_SESSION['cart']);
			$item_array_id = array_column($_SESSION['cart'],"fooditem_id"); 
			//print_r($item_array_id);

			//if an item is already added into the cart and the user again try to add it to the cart then we check if that item is already in the cart or not, if 'yes' then if block will execute and it will give error
			if(in_array($_POST['fooditem_id'],$item_array_id)){
				echo "<script>alert('Product is already added in the cart..!')</script>";
				echo "<script>window.location='index.php'</script>";
			}
			else{
				$count = count($_SESSION['cart']);
				$item_array = array(
					'fooditem_id' => $_POST['fooditem_id'],
					'qty' => $_POST['qty']
				);

				$_SESSION['cart'][$count]=$item_array;
				//print_r($_SESSION['cart']);
			}
		}else{
			//if 'cart' session variable is not set then else block will execute to set the 'cart' session variable
			$item_array = array(
				'fooditem_id'=>$_POST['fooditem_id'],
				'qty' => $_POST['qty']
				//storing id value in array in the form of key-value pair
			);
			$count = count($_SESSION['cart']);

			//create a new session variable
			$_SESSION['cart'][0] = $item_array;
			//print_r($_SESSION['cart']);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- css link -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
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
							<li>
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
							</li>
							<li>
								<a href="login_registration.php"><i class="fa fa-user-circle-o" aria-hidden="true" style="color: white; font-size: 18px;"> &nbsp;<?php echo $_SESSION['username']; ?></i></a>
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
	<div class="container">
		<div class="row">
				<h1 class="text-center">Menu</h1>
			</div>
		<div class="row text-center py-5">
			<?php
				// component("Product 1","Rs.599","./upload/product1.jpeg");
				// component("Product 2","Rs.699","./upload/product2.jpeg");
				// component("Product 3","Rs.999","./upload/product3.jpeg");
				// component("Product 4","Rs.899","./upload/product4.jpeg");

				$result = $database->getData();
				while($row = mysqli_fetch_assoc($result)){
					component($row['fooditem_name'],$row['fooditem_price'],$row['fooditem_image'],$row['id']);
				}
			?>
		</div>
	</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>