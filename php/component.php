<?php
	function component($fooditemname,$fooditemprice,$fooditemimg,$fooditemid){
		$element = "
			<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
				<form action=\"index.php\" method=\"post\">
					<div class=\"card shadow\">
						<div>
							<img src=\"$fooditemimg\" alt=\"image\" class=\"img-fluid card-img-top\">
							<div class=\"card-body\">
								<h5 class=\"card-title\">$fooditemname</h5>
								<h5>
									<span class=\"price\">Rs.$fooditemprice</span>
								</h5>
								<input class=\"qty\" type='number' max='10' min='0' required name='qty'/>

								<button type=\"submit\" name=\"add\" class=\"btn btn-warning my-3\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
								<input type='hidden' name='fooditem_id' value='$fooditemid' />

							</div>
						</div>
					</div>
				</form>
				</div>
		";
		echo $element;
	}


	function cartElement($fooditemimg,$fooditemname,$fooditemprice,$fooditemid,$qty){
		$element = "

         <form action=\"cart.php?action=remove&id=$fooditemid\" method=\"post\" class=\"cart-items\">
						<div class=\"border rounded\">
							<div class=\"row bg-white\">
								<div class=\"col-md-3\">
									<img src=$fooditemimg alt=\"image 1\" class=\"img-fluid\">
								</div>
								<div class=\"col-md-6\">
									<h5 class=\"pt-2\">$fooditemname</h5>
									<small class=\"text-secondary\">Seller:dailytuition</small>
									<h5 class=\"pt-2\">Price: $fooditemprice</h5>
									<h5 class='qty pt-2'>Quantity: $qty</h5>
									
								</div>
								<div class=\"col-md-3 py-5\">
									<button type=\"submit\" class=\"btn btn-danger py-4 btn-block\" name=\"remove\">Remove</button>
								</div>
							</div>
						</div>
					</form>
		";
		echo $element;
	}
?>