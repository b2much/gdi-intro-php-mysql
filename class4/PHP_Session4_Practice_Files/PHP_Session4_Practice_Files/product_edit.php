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
        <div class="header"><h1>Show Product</h1></div>
        <div class="navbar"><a href="product_show.php" class="nav">Show Product</a><a href="product_insert.html" class="navcurr">Insert Product</a><a href="company_show.php" class="nav">Show Company</a><a href="company_insert.html" class="nav">Insert Company</a></div>
        <div class="content">
			<?php 
				include 'include/db.inc.php';
				$id=$_GET['id'];
				$sql="SELECT company, type, roast, description 
							FROM  product 
							WHERE id='$id'";
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
            
            <form action="product_edit_result.php" method="get">
                Company: <input type="text" name="company" 
                            value="<?php echo $company ?>"/><br/>
            Type: <input type="text" name="type"
                            value="<?php echo $type ?>"/><br/>
            Roast:
            <input type="radio" name="roast" value="light"
                <?php if ($roast=="light") echo "selected='selected'" ?>>
                            Light</input>
            <input type="radio" name="roast" value="medium"
                <?php if ($roast=="medium") echo "selected='selected'" ?>>
                            Medium</input>
            <input type="radio" name="roast" value="dark" 
                    <?php if ($roast=="dark") echo "selected='selected'" ?>>
                            Dark</input>
             <textarea name="description" rows="10" cols="40">
			<?php echo $description ?></textarea>
             <input type="hidden" name="id" value=<?php echo $id ?> >
            <input type="submit" value="Submit"/>
        </form>





         </div>
        <div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
