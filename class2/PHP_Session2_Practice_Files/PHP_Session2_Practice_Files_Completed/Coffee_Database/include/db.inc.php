<?php
	/*Connect to a server*/
	$link=mysqli_connect ('localhost', 'root', 'root');/*If you are using a PC, this should be 'localhost', 'root', '',*/
	if  (!$link){	
		$output='Unable to connect to the database';
		echo $output; 	
		exit();
 	}
	/*Check for proper encoding*/
	if (!mysqli_set_charset($link,'utf8')) {	
		$output = 'Unable to set database connection encoding.';	
		echo $output; 	
		exit();
	}
	/*Connect to database, named coffee*/
	if (!mysqli_select_db($link, 'coffee')){	
		$output = 'Unable to locate the database.';	
		echo $output; 	
	exit();
	}
	//echo "You did ok!";
?>
