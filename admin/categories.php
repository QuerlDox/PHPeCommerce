<?php

	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	$sql = "SELECT * FROM categories WHERE parent = 0";
	$parent_table = $db -> query($sql);
	$parent = array();
	while($parent_result = mysqli_fetch_assoc($parent_table)){
		$parent[] = $parent_result;
	}
	

	$errors = array();
    if(isset($_POST) && !empty($_POST)){
    	$parent_input = sanitize($_POST['parent_input']);
    	$category_input = sanitize($_POST['category_input']);

    	$sql = "SELECT * FROM categories WHERE parent ='$parent_input' AND category ='$category_input' ";
    	$result = $db -> query($sql);
    	$count = mysqli_num_rows($result);


    	if($category_input == ''){
    		$errors[] .= ' The category cannot be left blank';
    	}

    	if($count > 0){
    		$errors[] .= $category_input.' already exists please choose a new category';
    	}

    	if(!empty($errors)){
    		$display = display_errors($errors);
    	
    		show_errors($display);
    		
    	}else{
    		$sql = "INSERT INTO categories (category, parent) VALUES ('$category_input', '$parent_input')";
    		if(isset($_GET['edit'])){
    			$sql = "UPDATE categories SET category ='$category_input' WHERE parent = '$parent_input' AND id = '$_GET[edit]'";
    		}
    		$db -> query($sql);
    		header('Location:categories.php');
    	}

    } 


    if(isset($_GET['delete']) && !empty($_GET['delete'])){
    	$delete_id =  sanitize($_GET['delete']);
    	$delete_id = (int)$delete_id;
    	$check_query = "SELECT * FROM categories WHERE parent= $delete_id";
    	$check_result = $db -> query($check_query);
    	$count = mysqli_num_rows($check_result);
    	if($count>0){
    		$errors[] .= ' is a parent and has existing child categories ';
    	}
    	if(!empty($errors)){
    		$display = display_errors($errors);
    	 	show_errors($display);
    	}
    	else{
    		
    		$delete_query = "DELETE from categories WHERE id = '$delete_id' ";
	    	$db -> query($delete_query);
    		header('Location:categories.php');    	
    	}
    }



    if(isset($_GET['edit']) && !empty($_GET['edit'])){
    	// sanitize the value
    	// get the database entry for the edit value
    	// preserve the edit id value in the form
    	// get the corresponding category value of the edit id
    	//$edit_parent = array();
    	$edit_id = sanitize($_GET['edit']);
    	$edit_id = (int)$edit_id;
 		$edit_query =  "SELECT * FROM categories WHERE id='$edit_id'";
 		$edit_result = $db->query($edit_query);
 		$edit_value = mysqli_fetch_assoc($edit_result);    	
 		$edit_category =  $edit_value['category'];
 		$edit_parent_id = $edit_value['parent'];
 		$sql = "SELECT * FROM categories WHERE id='$edit_parent_id'";

 		$parent_result = $db->query($sql);
 		if(mysqli_num_rows($parent_result)>0){
 		$parent_value = mysqli_fetch_assoc($parent_result);
 		$edit_parent = $parent_value['category'];

 		}else{
 			$edit_parent = 'Parent';
 			$edit_parent_id = 0;	
 		}
 	}
?>

<h2 class="text-center">Categories Home Page</h2>
<div class="row">
	<div class="col-md-6">
		<form class="form" action="categories.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
			<div id="errors"></div>
			<legend><?=((isset($_GET['edit']))?'Edit':'Add a') ?>  Category</legend>
			<div class="form-group">
				<label for="parent">Parent</label>

				<select class="form-control" id="parent_input" name="parent_input">
					<option value="<?=((isset($_GET['edit']))?$edit_parent_id:'0') ?> "><?=((isset($_GET['edit']))?$edit_parent:'Parent'); ?> </option>
					<?php foreach ($parent as $_parent) { ?>
						<option value="<?= $_parent['id']?>"><?= $_parent['category'] ?></option>
				     <?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="category">Category</label>
				<input type="text" class="form-control" name="category_input" id="category_input" value="<?=((isset($_GET['edit']))?$edit_category:''); ?>">
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success" value="<?= ((isset($_GET['edit']))?'Save':'Add')?> Category">
			</div>
		</form>
	</div>




<!--  -->

	<div class="col-md-6">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Category</th><th>Parent</th><th></th>
				</tr>
			</thead>
			<div id="errors"></div>
			<tbody>

				<?php foreach ($parent as $_parent) { 
					$parent_id = (int) $_parent['id'];
					$sql2 = "SELECT * FROM categories WHERE parent = $parent_id";
					$child_table = $db -> query($sql2);
				?>	

						<tr class="bg-primary">
							<td><?= $_parent['category']?></td>
							<td>Parent</td>
						    <td>
						    	<a href="categories.php?edit=<?= $_parent['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
						    	<a href="categories.php?delete=<?= $_parent['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a>
						    </td> 
						</tr>

					<?php while($child = mysqli_fetch_assoc($child_table)):?>
						<tr class="bg-info">
							<td><?= $child['category']?></td>
							<td><?= $_parent['category']?></td>
						    <td>
						    	<a href="categories.php?edit=<?= $child['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
						    	<a href="categories.php?delete=<?= $child['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a>
						    </td> 
						</tr>
					<?php endwhile;?>	
					
				<?php } ?>
			</tbody>
			
			
		</table>
	</div>
</div>

<?php
	include 'includes/footer.php';
?>