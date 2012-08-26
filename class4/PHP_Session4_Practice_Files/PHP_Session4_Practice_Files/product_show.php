<?php 
	include 'include/db.inc.php';
	$title="Class 4 Show Product";
	$product_show=true;
	include 'include/header.inc.php';
	
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
	include 'include/footer.inc.php';
?>



