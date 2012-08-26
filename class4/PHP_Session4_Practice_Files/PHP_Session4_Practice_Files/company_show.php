<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/style.css" type="text/css" rel="stylesheet"/>
<title>PHP Class 4 Show Company</title>
</head>

<body>

    <div class="wrapper">
    	<div class="headline"></div>
        <div class="header"><h1>Show Company</h1></div>
        <div class="navbar"><a href="product_show.php" class="nav">Show Product</a><a href="product_insert.php" class="nav">Insert Product</a><a href="company_show.php" class="navcurr">Show Company</a><a href="company_insert.html" class="nav">Insert Company</a><a href="search.php" class="nav">Search</a></div>
        <div class="content">
            <!--Enter PHP from slides 18-22 here-->
			<?php 
				include 'include/db.inc.php';
				$sql='SELECT company_id, name, country, website FROM company ORDER BY name DESC'; 
				$result = mysqli_query($link, $sql);
				
				if (!$result) { 	
					$error = 'Error fetching data: ' . mysqli_error($link);	
					echo $error; 	
					exit();
				}
				while($recording=mysqli_fetch_array($result)){
					$company_id=htmlspecialchars($recording['company_id'], ENT_QUOTES, 'UTF-8');	
					$name= htmlspecialchars($recording['name'], ENT_QUOTES, 'UTF-8');
					$country=htmlspecialchars($recording['country'], ENT_QUOTES, 'UTF-8');
					$website=htmlspecialchars($recording['website'], ENT_QUOTES, 'UTF-8');
				 		echo "<div class='product'><div class='company'>" . $name . "--";
						echo "<div class='roast'> " . $country . "</div></div>";
						echo "<div class='description'> <a href='$website' title='$name'>" . $website . "</a></div>
						</div>";
				}
			?>


         </div>
        <div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
