<?php 

	include 'includes/head.php';
	include 'includes/navigation.php';
	include 'includes/headerfull.php';
	include 'includes/leftsidebar.php';

	
?>

	<!-- Top Nav Bar-->


	<!-- Header -->
	
		<!--Left Side Bar-->

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
<?php
	include 'includes/rightsidebar.php';
	include 'includes/detailsmodal.php';
	
?>		
		
    </div>


	<footer class="text-center" id="footer">&copy; Copyright 2017-2018  Harold's Boutique</footer>

	<!-- Details Modal-->
	<!-- end of details modal-->

	<script>
		jQuery(window).scroll(function(){
			var vscroll = jQuery(this).scrollTop();
			jQuery('#logotext').css({"transform":"translate(0px, "+vscroll/2 + "px)"});
		});


		
	</script>
</body>
</html>