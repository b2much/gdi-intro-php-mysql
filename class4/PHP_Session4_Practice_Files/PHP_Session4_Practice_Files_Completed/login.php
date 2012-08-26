<?
/*Enter PHP from slides 14-15*/

	include 'include/db.inc.php';
	/*Get user name and password from login.php*/	
	$username = mysqli_real_escape_string($link, $_POST['username']);	
	$password = mysqli_real_escape_string($link, $_POST['password'] );	    
    /*Scramble password. md5 is a function that takes any variable (in our case $password) and scrambles it according to an algorithm. The output can either be a raw 16 character binary format or a 32 character hex number. To get 16 characters set the second parameter to TRUE. To get 32, set the second parameter to FALSE. Make sure to set the true/false the same in login.php as it was in create_account_result.php.*/
	$password = md5($password, FALSE);	
/*Get the user_id from the admin table where the username and scrambled password match*/
	$sql = "SELECT user_id FROM admin WHERE 
	username='$username' AND password='$password'";
/*assign $user_id to the value of the user_id from the table*/
	$result = mysqli_query($link, $sql);
	$recording = mysqli_fetch_array($result);
	$user_id=htmlspecialchars($recording['user_id'], ENT_QUOTES, 'UTF-8');
/*If the user_id is greater than zero, that means an entry in the table exists and the $username and $password were correct. Begin a session, let loggedIn be true, and for the duration of the session, remember the username and password. The computer will only remember your username and password on this one page. We have to add a bit of code to other pages for the computer to recognize the username and passowrd everywhere.*/	
	if ($user_id > 0){			  
	session_start();			
	$_SESSION['loggedIn'] = TRUE;			
	$_SESSION['username'] = $username;			
	$_SESSION['password'] = $password;		   
	header('Location:product_show.php');	
}
/* If the user_id was not greater than zero, that means there is no entry in our database. Don't log the person in and echo an error message*/
else{		
	session_start();		
	unset($_SESSION['loggedIn']);		
	unset($_SESSION['username']);		
	unset($_SESSION['password']);		
	echo 'The specified username address or password was incorrect.';	
	echo "<br />"; 		
	echo "<a href='login_form.php'>Back</a>"; 		
	exit(); 	}
 
?>