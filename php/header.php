<!-- <header id="header">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="index.php" class="navbar-brand">
			<h3 class="px-5">
				<i class="fas fa-shopping-basket"></i>Shopping Cart
			</h3>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="mr-auto"></div>
			<div class="navbar-nav">
				<a href="cart.php" class="nav-item active nav-link">
					<h5 class="px-5 cart">
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
			</div>
		</div>
	</nav>
</header> -->


<!-- <header id="header">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="index.php" class="navbar-brand">
			<h3 class="px-5">
				LOGO
			</h3>
		</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="mr-auto"></div>
			<div class="navbar-nav">
				<ul class="nav-links">
					<li>
						<a href="index.php" class="active" name="nav">Home</a>
					</li>
					<li>
						<a href="#about">About</a>
					</li>
					<li>
						<a href="#about">Contact</a>
					</li>
					<li>
						<a href="#" class="">Review</a>
					</li>
					<li>
				    <div class="dropdown">
						<i class="fa fa-user-circle-o" aria-hidden="true" style="color: white; font-size: 18px;"> &nbsp;ali</i>
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
	    				<span class="caret"></span></button>
	    				<ul class="dropdown-menu">
	      					<li><a href="logout.php">Logout</a></li>
	    				</ul>
				</div>
			</li>
			<li>
				<a href="cart.php" class="nav-item active nav-link">
					<h5 class="px-5 cart">
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
		</ul>
				
			</div>
		</div>
	</nav>
</header> -->


<header>
	<nav>
		<div class="logo">
			<h4>LOGO</h4>
		</div>
		<ul>
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
				<a href="#" class="">Review</a>
			</li>
			<li>
				<div class="dropdown">
					<i class="fa fa-user-circle-o" aria-hidden="true" style="color: white; font-size: 18px;"> &nbsp;ali</i>
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
    				<span class="caret"></span></button>
    				<ul class="dropdown-menu">
      					<li><a href="logout.php">Logout</a></li>
    				</ul>
				</div>
			</li>
		</ul>
	</nav>
</header>