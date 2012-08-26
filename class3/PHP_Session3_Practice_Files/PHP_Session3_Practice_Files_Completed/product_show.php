<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/style.css" type="text/css" rel="stylesheet"/>
<title>PHP Class 2 Show Product</title>
</head>

<body>

    <div class="wrapper">
    	<div class="headline"></div>
        <div class="header"><h1>Show Product</h1></div>
        <div class="navbar"><a href="product_show.php" class="navcurr">Show Product</a><a href="product_insert.php" class="nav">Insert Product</a><a href="company_show.php" class="nav">Show Company</a><a href="company_insert.html" class="nav">Insert Company</a><a href="search.php" class="nav">Search</a></div>
        <div class="content">
            <!--Enter PHP from slides 18-22 here-->
			<?php 
				include 'include/db.inc.php';
				$sql='SELECT product_id, company, type, roast, description  FROM product ORDER BY company DESC'; 
				$result = mysqli_query($link, $sql);
				
				if (!$result) { 	
					$error = 'Error fetching data: ' . mysqli_error($link);	
					echo $error; 	
					exit();
				}
				while($recording=mysqli_fetch_array($result)){
					$product_id=htmlspecialchars($recording['product_id'], ENT_QUOTES, 'UTF-8');
					/*Code to show company name from company table instead of id number*/	
					/*Get company as entered in the product table*/
					$company= htmlspecialchars($recording['company'], ENT_QUOTES, 'UTF-8');
					/*Get company id and name from company table*/
					$sql_company='SELECT company_id, name FROM company ORDER BY name WHERE company_id=company';					/*Tell me if there is an error. Result and sql are named differently to avoid confusion with the sql statement and error above*/
					$result_company = mysqli_query($link, $sql_company);
					if (!$result_company) { 
						$error = 'Error fetching data: ' . mysqli_error($link);
						echo $error; 
						exit();	
					}
					/*While there are companies in the table, get the name and id*/
					while($recording_company=mysqli_fetch_array($result_company)){
						$c_id=htmlspecialchars($recording_company['company_id'], ENT_QUOTES, 'UTF-8');
						$c_name=htmlspecialchars($recording_company['name'], ENT_QUOTES, 'UTF-8');
					}
					$type=htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
					$roast=htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
					$description=htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
				 		/*display show_company, the variable assigned above as the company name*/
						echo "<div class='product'><div class='company'>" . $c_name . "--";
						echo "<span class='type'> " . $type. "</span></div>";
						echo "<div class='roast'>Roast: " . $roast . "</div>";
						echo "<div class='description'> " . $description . "</div>";
						/*Enter link from slide 3*/
						echo "<a href='product_delete.php?product_id=$product_id'>Delete this record </a> | ";			
						
						/*Enter link from slide 5*/
						echo "<a href='product_edit.php?product_id=$product_id'>Edit this record</a>		</div>";
				}
			?>


         </div>
        <div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
