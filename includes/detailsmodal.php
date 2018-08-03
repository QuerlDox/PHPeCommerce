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

		</div><!-- end of modal content-->	
		</div>
	</div>
