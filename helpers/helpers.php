<?php
	

	function close_page(){
		echo "<script type='text/javascript'>
			window.close();
		</script>";
	}

	function display_errors($errors){
		$display = '<ul class="bg-danger">';
		foreach ($errors as $error) {
			$display.= '<li class="text-danger">'.$error.'</li>';
		}
		$display.= '</ul>';
		return $display;
	}

	function open_page($url){
		echo "<script type='text/javascript'>
			window.open('$url');
		</script>";
	}

	function sanitize($dirty){
		return htmlentities($dirty,ENT_QUOTES,'UTF-8');
	}

	function show_errors($display){
		echo  "<script>
			jQuery('document').ready(function(){
				jQuery('#errors').html('$display');
			});
			

		</script>";
	}


?>