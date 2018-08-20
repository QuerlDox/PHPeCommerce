<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	$sql_string = "SELECT * FROM brand ORDER BY brand";
	$sql_query = $db -> query($sql_string);
	$errors = array();	


	if(isset($_GET['delete']) && !empty($_GET['delete'])){
		$delete_id = sanitize($_GET['delete']);
		$delete_id = (int)$delete_id;
		

		$sql = "DELETE FROM brand WHERE id ='$delete_id'";
		$db -> query($sql);
	
		header('Location:brands.php');


	 }	






	 if(isset($_GET['edit']) && !empty($_GET['edit'])){
	 	$edit_id = sanitize($_GET['edit']);
	 	$edit_id = (int)$edit_id;
	 	

	 	$sql = "SELECT * FROM brand WHERE id ='$edit_id'";
	 	$edit_object = $db -> query($sql);
	 	$edit_brand = mysqli_fetch_assoc($edit_object);

	 	
	 }

	// TODO handle the submit click event
	// check if brand alreadyexists
	if(isset($_POST['add_submit'])){

		$brand_var = sanitize($_POST['brand']);
		$brand_query = "SELECT * FROM brand WHERE brand= '$brand_var'";
		if(isset($_GET['edit'])){
			$brand_query = "SELECT * FROM brand WHERE brand = '$brand_var' AND id != '$edit_id'";
		}

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
			if(isset($_GET['edit'])){
				$sql = "UPDATE brand SET brand = '$brand_var' WHERE id = '$edit_id'";
			}
			$db -> query($sql);
			header('Location:brands.php');
		}

	}



	
	
	 
    $brand_value = null;
	 if(isset($_GET['edit'])){
	 	$brand_value = $edit_brand['brand'];
	 }else{
	 	if(isset($_POST['brand'])){
	 		$brand_value = sanitize($_POST['brand']);
	 	}

	 }


?>
<h2 class="text-center">Brands Home Page</h2>

<div class="text-center">
<form class="form-inline" action="brands.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
	<label for="brand"><?=((isset($_GET['edit']))?'Edit ':'Add a ') ?>Brand</label>
	<input type="text" name="brand" id="brand" class='form-control' value="<?= $brand_value; ?>">
	<?php if(isset($_GET['edit'])): ?>
		<a href="brands.php" class="btn btn-default">Cancel</a>
    <?php endif; ?>
	<input type="submit" name="add_submit" id="add_submit" class="btn btn-lg btn-success" value="<?=((isset($_GET['edit']))?'Edit ':'Add ')?>Brand">
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
			<td><a href="brands.php?delete=<?php echo $brand_entry['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash" onclick=""></span></a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php
	include 'includes/footer.php';
?>