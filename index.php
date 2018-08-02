<!DOCTYPE html>
<html>
<head>
	<title>Harold's Boutique</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Top Nav Bar-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<a href="index.php" class="navbar-brand">Harold's Boutique</a>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Men<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Shirts</a></li>
							<li><a href="#">Pants</a></li>
							<li><a href="#">Shoes</a></li>
							<li><a href="#">Accessories</a></li>
						</ul>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Header -->
	<div id="headerWrapper">
		<div id="header-background"></div>
		<div id="logotext"></div>
	</div>
   
   
	<p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vehicula ante in sem feugiat, sit amet laoreet quam sagittis. Vestibulum pellentesque, ipsum sed hendrerit volutpat, dolor est mollis enim, vel eleifend metus odio eget sem. Vivamus vitae massa auctor, aliquam mi non, maximus velit. Cras cursus elit a turpis viverra malesuada sagittis in enim. 
      Nullam pretium iaculis massa, eu condimentum nisi aliquet at. In quis ultricies sem. Integer placerat sit amet arcu a volutpat. Proin imperdiet justo et sollicitudin dictum. Fusce eget ullamcorper arcu. Praesent sed rhoncus nisi, eget auctor purus. Vivamus ac posuere ante. Donec quis scelerisque dolor, vitae volutpat enim. Duis egestas nulla velit, ac egestas neque ornare at. Aliquam eu ante tortor. Cras sit amet sapien sapien.

	</p>
	
	<div class="container-fluid">
		<!--Left Side Bar-->
		<div class="col-md-2">Left Side Bar</div>
		<!--Main Content-->
		<div class="col-md-8">Main Content
			<div class="row">
			<h2 class="text-center">Feature Products</h2>
			<div class="col-md-3"  id="feature-product-img" >
				<h4 class="feature-product-description"       >Levis Jeans</h4>
				<img src="images/products/men4.png" class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s>$54.99</s></p>
				<p class="price">Our Price: $19.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>
			<div class="col-md-3"  id="feature-product-img">
  				<h4 class="feature-product-description"      >Women's Sweater</h4>
				<img src="images/products/women7.png" class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s>$40.22</s></p>
				<p class="price">Our Price: $30.56</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>

			<div class="col-md-3" id="feature-product-img">
				<h4 class="feature-product-description"     >Women's Shoes</h4>
				<img src="images/products/shoes.jpg"  class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s>$20.98</s></p>
				<p class="price">Our Price: $18.00</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>

			<div class="col-md-3" id="feature-product-img">
				<h4 class="feature-product-description"    >Men's Belt</h4>
				<img src="images/products/men7.png"   class="img-thumb"  />
				<p class="list-price text-danger">List Price:  <s>$8.00</s></p>
				<p class="price">Our Price: $7.00</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>
			
			</div>

			<!--2nd row of Feature Products-->

		
			
			<div class="col-md-3"  id="feature-product-img" >
				<h4 class="feature-product-description"   >Levis Jeans</h4>
				<img src="images/products/men4.png" class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s>$54.99</s></p>
				<p class="price">Our Price: $19.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>
			<div class="col-md-3"  id="feature-product-img">
  				<h4 class="feature-product-description"  >Women's Sweater</h4>
				<img src="images/products/women7.png" class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s>$40.22</s></p>
				<p class="price">Our Price: $30.56</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>

			<div class="col-md-3" id="feature-product-img">
				<h4 class="feature-product-description" >Women's Shoes</h4>
				<img src="images/products/shoes.jpg"  class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s>$20.98</s></p>
				<p class="price">Our Price: $18.00</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>

			<div class="col-md-3" id="feature-product-img">
				<h4 class="feature-product-description">Men's Belt</h4>
				<img src="images/products/men7.png"   class="img-thumb"  />
				<p class="list-price text-danger">List Price:  <s>$8.00</s></p>
				<p class="price">Our Price: $7.00</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-1">details</button>
			</div>
			
			</div>


		
		<!-- Right Side Bar-->
		<div class="col-md-2">Right Side Bar</div>  
	</div>

	<footer class="text-center" id="footer">&copy; Copyright 2017-2018  Harold's Boutique</footer>

	<!-- Details Modal-->
	<div class="modal fade detail-1" id="detail-1" tabindex="-1" role="dialog" aria-labelledby="detail-1" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		<div class="modal-content">	
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center">Levis Jeans</h4>
			</div>
			<!-- end of modal-header-->

			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block">
								<img src="images/products/men4.png" alt="Levis Jeans" class="details img-responsive"/>
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Details</h4>
							<p>These Jeans are amazing.Get it now!</p>
							<hr>
							<p>Price: $34.99</p>
							<p>Brand: Levis</p>
							<form action="add_cart.php" method="post">
								<div class="form-group">
									<div class="col-xs-3">
										<label for="quantity">Quantity:</label>
										<input type="text" class="form-control" name="quantity" id="quantity">
									</div>
									<p>Available: 3</p>
								</div>
							<br><br>
							<div class="form-group">
								<label for="size">Size:</label>
								<select name="size" id="size" class="form-control">
									<option value=""></option>
									<option value="28">28</option>
									<option value="32">32</option>
									<option value="36">36</option>
								</select>	
							</div>	
							</form>	
						</div>
					</div>
				</div>
			</div>
			<!-- End of modal-body-->

			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Close</button>
				<button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
			</div><!-- end of modal-footer-->

		<div><!-- end of modal content-->	
		</div>
	</div><!-- end of details modal-->

	<script>
		jQuery(window).scroll(function(){
			var vscroll = jQuery(this).scrollTop();
			jQuery('#logotext').css({"transform":"translate(0px, "+vscroll/2 + "px)"});
		});


		
	</script>
</body>
</html>