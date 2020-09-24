<?php 



	/**
	 *  Validation message
	 */

	
	function validationMsg($text, $color_type = 'danger'){
		return "<p class='alert alert-$color_type'>$text<button class='close' data-dismiss='alert'>&times;</button></p>";
	}



 ?>