<?php 
	include 'include/db.inc.php'; 
	$company = mysqli_real_escape_string($link, $_GET['company']); 
	$type = mysqli_real_escape_string($link, $_GET['type']); 
	$roast = mysqli_real_escape_string($link, $_GET['roast']);
	$description = mysqli_real_escape_string($link, $_GET['description']);
	
	$sql = "INSERT INTO product SET
		company='$company',
		type='$type',
		roast='$roast',
		description='$description'";

	if (!mysqli_query($link, $sql)){
			$error = 'Error adding submitted data: ' . mysqli_error($link);
			echo $error;
			exit();
		}
		header('Location:product_show.php');
?>
