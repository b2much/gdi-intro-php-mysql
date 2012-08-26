<?php
	/*Enter PHP from slide 4*/	
	include 'include/db.inc.php'; 
	$product_id = $_GET['product_id'];
	$sql = "DELETE FROM product WHERE 
				product_id='$product_id'";
	$result = mysqli_query($link, $sql);
	
	if (!$result) { 	
		$error = 'Error deleting product' . mysqli_error($link);	
		echo $error; 	
		exit();
	}
	header('location:product_show.php'); 
?>
