<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/style.css" type="text/css" rel="stylesheet"/>
<title>PHP Class 3 Edit Product</title>
</head>

<body>

    <div class="wrapper">
    	<div class="headline"></div>
        <div class="header"><h1>Edit Product</h1></div>
        <div class="navbar"><a href="product_show.php" class="nav">Show Product</a><a href="product_insert.html" class="navcurr">Insert Product</a><a href="company_show.php" class="nav">Show Company</a><a href="company_insert.html" class="nav">Insert Company</a><a href="search.php" class="nav">Search</a></div>
        <div class="content">
			<?php 
				/*Insert PHP from slides 6 and 7*/
				include 'include/db.inc.php';
				$product_id=$_GET['product_id'];
				$sql="SELECT company, type, roast, description 
						FROM  product 
						WHERE product_id='$product_id'";
	 			$result = mysqli_query($link, $sql);
				if (!$result) { 	
					$error = 'Error: ' . mysqli_error($link);	
				echo $error; 	
				exit();
				}
				$recording=mysqli_fetch_array($result);
				
				$company=htmlspecialchars($recording['company'], ENT_QUOTES, 'UTF-8');
				$type = htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
				$roast = htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
				$description = htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
		

			?>
            
            <!--Insert form from slides 8 and 9-->
			<form action="product_edit_result.php" method="get">
            <!--Code to show company name in drop down by getting values from company table-->
            <select name="company">
            				<!--if company is blank, show no value-->
							<option value=""<?php if ($company=="") echo "selected='selected'" ?>>Choose</option>
							<?php
								/*Get company_id and name from company table*/
								$sql_company='SELECT company_id, name FROM company ORDER BY name';
								/*Let me know if there is an error*/
								$result_company = mysqli_query($link, $sql_company);
								if (!$result_company) { 
									$error = 'Error fetching data: ' . mysqli_error($link);
									echo $error; 
									exit();	
								}
								/*while there are companies in the table get company_id and name*/
								while($recording_company=mysqli_fetch_array($result_company)){
									$c_id=htmlspecialchars($recording_company['company_id'], ENT_QUOTES, 'UTF-8');
									$c_name=htmlspecialchars($recording_company['name'], ENT_QUOTES, 'UTF-8');
									/*If company from product table equals company_id from company table, show the company name as the selected dropdown menu*/
									if ($company==$c_id){
										echo "<option value=$c_id selected='selected'>" . $c_name .  "</option>";
									}
									/*else create a dropdown menu with the company name, but do not show it as selected*/
									else{
										echo "<option value=$c_id>" . " ". $c_name. "</option>";
									}
									
									}
						  
						  ?>
             </select><br/>
            Type: <input type="text" name="type"  value="<?php echo $type ?>"/><br/>
            
            Roast:
            <input type="radio" name="roast" value="light"
                <?php if ($roast=="light") echo "checked='checked'" ?>>
                            Light</input>
            <input type="radio" name="roast" value="medium"
                <?php if ($roast=="medium") echo "checked='checked'" ?>>
                            Medium</input>
            <input type="radio" name="roast" value="dark" 
                    <?php if ($roast=="dark") echo "checked='checked'" ?>>
                            Dark</input><br/>
            <textarea name="description" rows="10" cols="40">
			<?php echo $description ?></textarea><br/>
	 <input type="hidden" name="product_id" value="<?php echo $product_id ?>" >
	<input type="submit" value="Submit"/>
</form>






         </div>
        <div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
