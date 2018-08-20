<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	$errors = array();

	session_start();
	$edit_brand = $_SESSION['edit_value'];
	
	
	$_POST['brand'] = $edit_brand['brand'];	
	

?>


<h2 class="text-center">Edit Brand Home Page</h2>

<div class="text-center">
<form class="form-inline" action="edit_brand.php" method="post">
	<label for="new_brand">Edit a Brand</label>
	<input type="text" name="new_brand" id="new_brand" class='form-control' value="<?php echo ((isset($_POST['new_brand']))?$_POST['new_brand']:$_POST['brand']); ?>">
	<input type="submit" name="edit_submit" id="edit_submit" class="btn btn-lg btn-success" value="Save Brand">
</form>
</div>

<?php
	if(isset($_POST['edit_submit'])){
		$brand_input = sanitize($_POST['new_brand']);
		$brand_query = "SELECT * FROM brand WHERE brand= '$brand_input'";
		$brand_object = $db -> query($brand_query); 
		$count = mysqli_num_rows($brand_object);

		if($count > 0){
			
			$errors[] .= $brand_input.' already exists please enter a different brand name';
		}

		$id = $edit_brand['id'];
		$id = (int)id;
		
	
	    if($_POST['brand']  == ""){
			$errors[] .= 'Field cannot be empty';
			
		}

		if(!empty($errors)){
			echo display_errors($errors);
		}else{
			$sql = "UPDATE brand SET brand = '$brand_input' WHERE id = $id";
			$db -> query($sql);
			close_page();
			header('Location:brands.php');
		}
	}	

?>


<?php
	include 'includes/footer.php';
?>