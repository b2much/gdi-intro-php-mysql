<?php 
	/*Insert PHP from slides 10 and 11*/
	include 'include/db.inc.php'; 
	
	$product_id =$_GET['product_id']; 
	$company = mysqli_real_escape_string($link, $_GET['company']); 
	$type = mysqli_real_escape_string($link, $_GET['type']); 
	$roast = mysqli_real_escape_string($link, $_GET['roast']);
	$description = mysqli_real_escape_string($link, $_GET['description']);
	
	$sql = "UPDATE product SET
	company='$company',
	type='$type',
	roast='$roast',
	description='$description'
	WHERE product_id='$product_id'";
	
	if (!mysqli_query($link, $sql)){
		$error = 'Error adding submitted data: ' . mysqli_error($link);
		echo $error;
		exit();
	}
	header('Location:product_show.php');
?>