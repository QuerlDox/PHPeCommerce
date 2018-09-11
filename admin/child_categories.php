<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/phpECommerce/phpECommerce/core/init.php';
 $parent_id = $_POST['parent_id'];
 $parent_id = (int)$parent_id;
 $category_query = "SELECT * FROM categories WHERE parent = '$parent_id' ORDER BY category";
 $category_result = $db -> query($category_query); 
 ob_start();
?>
	<option value=""></option>
	<?php while($child = mysqli_fetch_assoc($category_result)): ?>
		<option value="<?=$child['id']?>" <?((isset($_POST['parent_id']))?' selected':'')?>><?=$child['category']?></option>
	<?php endwhile; ?>
<?php
	echo ob_get_clean();
?>