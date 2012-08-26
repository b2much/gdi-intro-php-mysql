<?php 
	include 'include/db.inc.php';
	$title="Create Account";
	include 'include/header.inc.php';
?>

<!--Enter form from slide 11-->
<!--Simple form to login, type text for username and type password for password. Type password creates the black dots, but does not secure the information. It only hides it from view-->
<form action="create_account_result.php" method="post">
	Username:<input type="text" name="username"/><br/>
	Password:<input type="password" name="password"/><br/>		<input type="submit" value="Create Account"/>	
</form>


<?
	include 'include/footer.inc.php';
?>



