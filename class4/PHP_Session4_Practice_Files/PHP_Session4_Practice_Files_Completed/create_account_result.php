<?php 
	include 'include/db.inc.php';
	$title="Account Created";
	include 'include/header.inc.php';


/*Enter PHP from slide 12*/
/*Get user name and password from create_account_result.php*/
	$password = mysqli_real_escape_string($link, $_POST['password']); 	
	$username = mysqli_real_escape_string($link, $_POST['username']);
/*Scramble password. md5 is a function that takes any variable (in our case $password) and scrambles it according to an algorithm. The output can either be a raw 16 character binary format or a 32 character hex number. To get 16 characters set the second parameter to TRUE. To get 32, set the second parameter to FALSE*/
	$password = md5($password, FALSE);
/*Insert the username and now scrambled password into the admin table*/
		$sql = "INSERT INTO admin SET	
	password='$password',	
	username='$username'";		
/*If there is an error, tell me why*/	
	if (!mysqli_query($link, $sql)){	
	$error = 'Error adding submitted data: ' . mysqli_error($link);	
	echo $error;	
	exit();	
	}
/*If there is no error, echo this line*/
	echo "Thank you, your account has been created.";



	include 'include/footer.inc.php';
?>



