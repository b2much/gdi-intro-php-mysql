<?php 
	include 'include/db.inc.php'; 
	$name = mysqli_real_escape_string($link, $_GET['name']); 
	$country = mysqli_real_escape_string($link, $_GET['country']); 
	$website = mysqli_real_escape_string($link, $_GET['website']);
	
	$sql = "INSERT INTO company SET
		name='$name',
		country='$country',
		website='$website'";

	if (!mysqli_query($link, $sql)){
			$error = 'Error adding submitted data: ' . mysqli_error($link);
			echo $error;
			exit();
		}
		header('Location:company_show.php');
?>
