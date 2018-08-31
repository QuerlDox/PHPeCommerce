<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/phpECommerce/phpECommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

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

<?php
	include 'includes/footer.php';
?>