<?php
	include 'include/db.inc.php'; 
	$id = $_GET['id'];
	$sql = "DELETE FROM product WHERE 
				id='$id'";
	$result = mysqli_query($link, $sql);
	
	if (!$result) { 	
		$error = 'Error deleting tip' . mysqli_error($link);	
		echo $error; 	
		exit();
	}
	header('location:product_show.php'); 
?>
