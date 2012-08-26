<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/style.css" type="text/css" rel="stylesheet"/>
<title>PHP Class 1 Results</title>
</head>

<body>

    <div class="wrapper">
        <div class="header"><h1>Results Page</h1></div>
        <div class="content">
            <!--Enter PHP code from slides 21-25-->
            <?php
 				$in = $_GET['inches']; 
				$first = $_GET['first_name']; 
				$last = $_GET['last_name']; 
 				$in = htmlspecialchars($in, ENT_QUOTES, 'UTF-8');
				$first = htmlspecialchars($first, ENT_QUOTES, 'UTF-8');
				$last = htmlspecialchars($last, ENT_QUOTES, 'UTF-8');
				
				echo "Hello, " . $first . " " . $last . "!<br/>";
				
 				echo " You entered " . $in . " inches.<br/>";
				
				$cm=$in*2.54;
				
				$cm=round($cm, 2);

				echo " That is " . $cm . " centimeters."; 

				
			?>


        </div>
        <div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
