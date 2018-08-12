
<?php
	require_once '../core/init.php';
	$id = $_POST['id'];
	$id = (int)$id;
	$sql = "SELECT * FROM products WHERE id = '$id'";
	$sql_query = $db -> query($sql);
	$modal_product = mysqli_fetch_assoc($sql_query);
	$brand_id = (int)$modal_product['brand'];
	$sql = "SELECT * FROM brand WHERE id = '$brand_id'";
	$sql_query = $db -> query($sql);
	$modal_brand = mysqli_fetch_assoc($sql_query);
	$sizes_column = $modal_product['sizes'];
	$sizes_array = explode(',', $sizes_column);
?>
<?php ob_start();?>

<div class="modal fade details-modal" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		<div class="modal-content">	
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center"><?php echo $modal_product['title']?></h4>
			</div>
			<!-- end of modal-header-->

			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block">
								<img src="<?php echo $modal_product['image']?>" alt="<?php echo $modal_product['title']?> class="details img-responsive"/>
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Details</h4>
							<p><?php echo $modal_product['description']?></p>
							<hr>
							<p><?php echo $modal_product['list_price']?></p>
							<p>Brand: <?php echo $modal_brand['brand']?></p>

							
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
									<?php foreach($sizes_array as $sizes_array_element){
									   $sizes_entry = explode(':', $sizes_array_element);
									   $size = $sizes_entry[0];
									   $quantity = $sizes_entry[1];	
								
									echo'<option value=".$size.">'.$size.'('.$quantity.' Available)</option>';
									
									

									} ?>
							</select>		
							</div>	
							</form>	
						</div>
					</div>
				</div>
			</div>

			<!-- End of modal-body-->

			<div class="modal-footer">
				<button class="btn btn-default" onclick="closeModal()">Close</button>
				<button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
			</div><!-- end of modal-footer-->

		</div><!-- end of modal content-->	
		<script type="text/javascript">
			function closeModal(){
				jQuery('#details-modal').modal('hide');
				setTimeout(function(){
					jQuery('#details-modal').remove();
					jQuery('.modal-backdrop').remove();
				},500);
			}
		</script>
		</div>
	</div>
<?php echo ob_get_clean(); ?>