<?php
	
	require_once 'core/init.php';

	include 'includes/head.php';
	include 'includes/navigation.php';
	include 'includes/headerfull.php';
	include 'includes/leftsidebar.php';

	$sql = "SELECT * FROM products WHERE featured = 1";
	$featured_query = $db -> query($sql);

	
?>

	<!-- Top Nav Bar-->


	<!-- Header -->
	
		<!--Left Side Bar-->

		<!--Main Content-->
		<div class="col-md-8">Main Content
			<div class="row">
			<h2 class="text-center">Feature Products</h2>

			<?php while($featured = mysqli_fetch_assoc($featured_query)): ?>
			<div class="col-md-4"  id="feature-product-img" >
				<h4 class="feature-product-description"><?php echo $featured['title']?></h4>
				<img src="<?php echo $featured['image'] ?>" alt="<?php echo $featured['title']?>" class="img-thumb" />
				<p class="list-price text-danger">List Price:  <s><?php echo $featured['list_price'] ?></s></p>
				<p class="price">Our Price: <?php echo $featured['price']?></p>
				<button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?php echo $featured['id']?>);">details</button>
			</div>
			<?php endwhile; ?>
			</div>
		</div>	
			

		<!-- Right Side Bar-->
<?php
	include 'includes/rightsidebar.php';
//	include 'includes/detailsmodal.php';
	
?>		
		
    </div>

<?php 
	include 'includes/footer.php';
?>
	<!-- Details Modal-->
	<!-- end of details modal-->

	<script>
		jQuery(window).scroll(function(){
			var vscroll = jQuery(this).scrollTop();
			jQuery('#logotext').css({"transform":"translate(0px, "+vscroll/2 + "px)"});
		});

		function detailsmodal(id){
			var data = {"id" : id};
			jQuery.ajax({
			//	url : <?php echo BASEURL;?> + 'includes/detailsmodal.php',
				url : 'includes/detailsmodal.php',
				method : "post",
				data: data,
				success: function(data){
					jQuery('body').append(data);
					jQuery('#details-modal').modal('toggle');
				},
				error: function(){
					alert("detailsmodal function error!");
				}
			});
		}
	</script>
	
</body>
</html>