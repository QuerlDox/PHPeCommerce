<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/phpECommerce/phpECommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	if(isset($_GET['add']) && !empty($_GET['add'])){

		$brand_query =  "SELECT * FROM brand ORDER BY brand";
		$brand_result =  $db -> query($brand_query);
		$parent_query = "SELECT * FROM categories WHERE parent = 0 ORDER BY category";
		$parent_result = $db -> query($parent_query);

 ?>

		<h2 class="text-center">Products Home Page</h2>
		<form action="products.php?add=1" method="POST">
			<div class="row">	
				<div class="form-group col-md-3">
					<label for="title">Title: </label>
						<input type="text" name="title" id="title" class="form-control" value="<?=(isset($_POST['title'])?sanitize($_POST['title']):'')?>">
				</div>	
				<div class="form-group col-md-3">
						<label for="brand">Brand: </label>
						<select class="form-control" name="branda" id="brand">
							<option value="" <?=((isset($_POST['brand']) && $_POST['brand'] == '')?' selected':'');?>></option>

							<?php while($brand = mysqli_fetch_assoc($brand_result)): ?>
						    <option value="<?= $brand['id']?>" <?=((isset($_POST['brand']) && $_POST['brand'] == $brand['id'])?' selected':''); ?> > <?=$brand['brand']?> </option>	
							<?php endwhile; ?>	

						</select>
				</div>	
				<div class="form-group col-md-3">
					<label for="parent">Parent: </label>
					<select class="form-control" id="parent" name="parent">
						<option value="" <?=((isset($_POST['parent']) && $_POST['parent'] == '')?' selected':'')?>></option>
						<?php while($parent = mysqli_fetch_assoc($parent_result)): ?>
							<option value="<?=$parent['id']?>" <?=((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' selected':'')?>> <?=$parent['category']?></option>
						<?php endwhile;?>
					</select>
				</div>	

				<div class="form-group col-md-3">
					<label for="child">Child: </label>
					<select class="form-control" name="child" id="child">
					</select>
				</div>		
			</div>
			<div class="row">
				<div class="form-group col-md-3">
					<label for="price">Price</label>
					<input class="form-control" type="text" name="price" id="price" value="<?=((isset($_POST['price']))?sanitize($_POST['price']):'');?>">
				</div>
				<div class="form-group col-md-3">
					<label for="list_price">List Price</label>
					<input class="form-control" type="text" name="list_price" id="list_price" value="<?=((isset($_POST['list_price']))?sanitize($_POST['list_price']):'');?>">
				</div>
				<div class="form-group col-md-3">
					
					<button class="btn btn-default form-control" onclick="jQuery('#sizes_modal').modal('toggle');return false;">Quantity & Sizes</button>
				</div>
				<div class="form-group col-md-3">
					<label for="sizes">Sizes & Quantity Preview</label>
					<input type="text" class="form-control" name="sizes" id="sizes" value="<?=((isset($_POST['sizes']))?sanitize($_POST['sizes']):'');?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="photo">Product Photo: </label>
					<input type="file" name="photo" id="photo" class="form-control">
				</div>
				<div class="form-group col-md-6">
					<label for="description">Description: </label>
					<textarea id="description" name="description" class="form-control" rows="6"><?=((isset($_POST['description']))?sanitize($_POST['description']):'');?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3 pull-right">	
					<input type="submit" class="form-control btn-default btn-success" value="Add Product">	
				</div>
			</div>
		</form>
		
		<!-- Modal -->
		<div class="modal fade" id="sizes_modal" tabindex="-1" role="dialog" aria-labelledby="sizes_modal_label" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="sizes_modal_label">Sizes & Quantity</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ...
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" onclick="updateSizes();jQuery('#sizes_modal').modal('toggle'); return false;">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

  <?php  }
 
else{

	$product_query = "SELECT * FROM products ";
	$product_result = $db -> query($product_query);


	if(isset($_GET['featured'])){
		$id = sanitize($_GET['id']);
		$id = (int)$id;
		$featured = sanitize($_GET['featured']);
		$featured = (int)$featured;
		$sql = "UPDATE products SET featured = '$featured' WHERE id = '$id' ";
		$db -> query($sql);
		header('Location:products.php');
	}
?>
<h2 class="text-center">Products Home Page</h2>
<a href="products.php?add=1" class="btn btn-success pull-right" role="button" id="add-product-btn">Add Product</a>
<table class="table table-bordered table-condensed table-striped">
	<thead>
		<tr>
			<th></th><th>Product</th><th>Price</th><th>Category</th><th>Feature</th><th>Sold</th>
		</tr>	
	</thead>
	<tbody>
		<?php while($product = mysqli_fetch_assoc($product_result)):
				$category_id = $product['categories'];
				$category_query = "SELECT * FROM categories WHERE id ='$category_id'";
				$category_result = $db -> query($category_query);
				$category = array();
				while($category_table = mysqli_fetch_assoc($category_result)){
					$category = $category_table;
				}
				$parent_id = $category['parent'];
				$parent_query = "SELECT * FROM categories WHERE id='$parent_id'";
				$parent_result = $db -> query($parent_query);
				$parent = array();
				while ($parent_table = mysqli_fetch_assoc($parent_result)) {
					$parent = $parent_table;
				}
				$parent_category = $parent['category'].'-'.$category['category'];
		 ?>
			

		<tr>
			<td>
				<a href="products.php?edit=<?= $product['id']?>"><button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></button></a>
				<a href="products.php?delete=<?= $product['id'] ?>"><button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></button></a>

			</td>
			<td><?= $product['title']?></td>
			<td><?= currency($product['price'])?></td>
			<td><?= $parent_category?></td>
			<td><a href="products.php?featured=<?= (($product['featured'] == 0)?'1':'0');?>&id=<?=$product['id'];?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-<?= (($product['featured'] == 1)?'minus':'plus');?>"></span></a>&nbsp <?=(($product['featured'] == 1)?'Featured Product':'');?></td>
			<td>sold</td>
		</tr>
	<?php endwhile; ?>
	</tbody>
	
</table>



<?php }
	include 'includes/footer.php';
?>