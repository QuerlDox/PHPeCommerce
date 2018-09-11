
	<footer class="text-center" id="footer">&copy; Copyright 2017-2018  Harold's Boutique</footer>
	<script type="text/javascript">
		function updateSizes(){
			alert("update sizes");
		}
		function get_child_options(){
			var parent_id = jQuery('#parent').val();
			jQuery.ajax({
				url: "/phpECommerce/phpECommerce/admin/child_categories.php",
				type: 'POST',
				data: {parent_id:parent_id},
				success: function(data){
					jQuery('#child').html(data);
				},
				error: function(){
					alert("Something went wrong with the child options");
				},
			});
		}
		jQuery('select[name = "parent"]').change(get_child_options);
	</script>