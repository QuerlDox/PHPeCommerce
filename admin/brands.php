<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	$sql_string = "SELECT * FROM brand ORDER BY brand";
	$sql_query = $db -> query($sql_string);
	$errors = array();	


	// TODO handle the submit click event
	// check if brand alreadyexists
	if(isset($_POST['add_submit'])){

		$brand_var = sanitize($_POST['brand']);
		$brand_query = "SELECT * FROM brand WHERE brand= '$brand_var'";
		$brand_object = $db -> query($brand_query); 
		$count = mysqli_num_rows($brand_object);
		if($count >0){
			$errors[] .= $brand_var.' already exists please enter a different brand name';
		}


		if($_POST['brand']  == ""){
			$errors[] .= 'Field cannot be empty';
			
		}



		if(!empty($errors)){
			echo display_errors($errors);
		}else{
			$sql = "INSERT INTO brand (brand) VALUES('$brand_var')";
			$db -> query($sql);
			header('Location:brands.php');
		}

	}
	 

?>
<h2 class="text-center">Brands Home Page</h2>

<div class="text-center">
<form class="form-inline" action="brands.php" method="post">
	<label for="brand">Add a Brand</label>
	<input type="text" name="brand" id="brand" class='form-control' value="<?php echo ((isset($_POST['brand']))?$_POST['brand']:''); ?>">
	<input type="submit" name="add_submit" id="add_submit" class="btn btn-lg btn-success" value="Add Brand">
</form>
</div>

<table class="table table-bordered table-striped table-auto">
	<thead>
	<th></th><th>Brand</th></th></th>
	</thead>
	<tbody>
		<?php while($brand_entry = mysqli_fetch_assoc($sql_query)): ?>
		<tr>
			<td><a href="brands.php?edit=<?php echo $brand_entry['id']?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><?php echo $brand_entry['brand']?></td>
			<td><a href="brands.php?delete=<?php echo $brand_entry['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php
	include 'includes/footer.php';
?>