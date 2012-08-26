<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/style.css" type="text/css" rel="stylesheet"/>
<title>PHP Class 3 Search Results</title>
</head>

<body>

    <div class="wrapper">
    	<div class="headline"></div>
        <div class="header"><h1>Search Results</h1></div>
        <div class="navbar"><a href="product_show.php" class="nav">Show Product</a><a href="product_insert.php" class="nav">Insert Product</a><a href="company_show.php" class="nav">Show Company</a><a href="company_insert.html" class="nav">Insert Company</a><a href="search.php" class="nav">Search</a></div>
        <div class="content">
            <!--Enter PHP from slides 16-19 here-->
            <?php
				include 'include/db.inc.php';
				/*Get keyword, roast, or company from search form*/
				$keyword=$_GET['keyword'];
				$roast= $_GET['roast'];
				$company= $_GET['company'];
				/*select fields from both the product and company tables. Use the format tablename.fieldname as fieldname. If, for example the product_id and company_id were both named id in your table, make sure to name them something unique after the as so there is no confusion*/
				$fields="SELECT 
						product.product_id as product_id, 		
						product.type as type, 
						product.roast as roast, 
						product.company as company,
						product.description as description, 
						company.company_id as company_id, 							
						company.name as name ";
				/*say which tables you are selecting from*/
				$table="FROM product, company ";
				/*where 1=1 (a condition that is always true, and the company in the product table and the company id in the company table are the same. Otherwise, you would have repeated data*/
				$where="where 1=1 and 
							product.company=company.company_id";
				/*if the $keyword is not blank, search the description for the keyword. LIKE means the word can be anywhere and the % symbols mean that the word doesn't have to be exact. If you searched for mountain, but a description contains mountains, it would still come up*/
				if ($keyword != ''){
					$where .= " AND product.description LIKE '%$keyword%'";
				}
				/*if $roast is not blank, search for the roast. We do not need like, because the options were as radio buttons*/
				if ($roast != ''){
					$where .= " AND product.roast = '$roast'";
				}
				/*if $company is not blank, search for company. We do not need like, because the options were a drop down menu*/
				if ($company != ''){
					$where .= " AND company.company_id = '$company'";
				}
				/*Make a sql string from the variables above*/
				$sql=$fields.$table.$where;
	
				$result = mysqli_query($link, $sql);
				if (!$result) { 	
					$error = 'Error fetching data: ' . mysqli_error($link);
					echo $error; 	
				exit();
				}
				/*While the search results hold true, e.g. if you searched for medium roast--while there are products with a medium roast, display the following*/
				while($recording=mysqli_fetch_array($result)){
					$product_id=htmlspecialchars($recording['product_id'], ENT_QUOTES, 'UTF-8');
					/*this value is actually from the company table, but since we named them above, we can call it without another while loop like in the product_show.php example*/
					$company= htmlspecialchars($recording['name'], ENT_QUOTES, 'UTF-8');
					$type=htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
					$roast=htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
					$description=htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
				
					echo "<div class='product'>
								<div class='company'>" . $company . "--";
					echo "<span class='type'> " . $type . "</span></div>";						
					echo "<div class='roast'>Roast: " . $roast . "</div>";
					echo "<div class='description'> " . $description . "</div>						
					</div>";	
				}

			?>



         </div>
        <div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
