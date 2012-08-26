<?php 
/*Include file to connect to server and database*/
	include 'include/db.inc.php'; 
/*Get data from form, clean it up for the MySQL database, assign it to a variable*/
	$company = mysqli_real_escape_string($link, $_GET['company']); 
	$type = mysqli_real_escape_string($link, $_GET['type']); 
	$roast = mysqli_real_escape_string($link, $_GET['roast']);
	$description = mysqli_real_escape_string($link, $_GET['description']);
/*Include file to connect to server and database*/
	$sql = "INSERT INTO product SET
	company='$company',
	type='$type',
	roast='$roast',
	description='$description'";
/*Check for errors*/
	if (!mysqli_query($link, $sql)){
		$error = 'Error adding submitted data: ' . mysqli_error($link);
		echo $error;
		exit();
	}
/*Jump to product_show.php, instead of haning out here*/
	header('Location:product_show.php');
?>
