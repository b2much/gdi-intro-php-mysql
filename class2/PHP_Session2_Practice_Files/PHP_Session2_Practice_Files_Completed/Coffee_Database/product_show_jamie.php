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
        <div class="navbar"><a href="product_show.php" class="navcurr">Show Product</a><a href="product_insert.html" class="nav">Insert Product</a><a href="company_show.php" class="nav">Show Company</a><a href="company_insert.html" class="nav">Insert Company</a></div>
        <div class="content">          

<?php
    include 'include/db.inc.php';
$sql='SELECT product_id, company, type, roast, description FROM product ORDER BY company ASC';
$result = mysqli_query($link, $sql);
          if (!$result) {
          $error = 'Error fetching data: ' . mysqli_error($link); 
          echo $error;
          exit();
           }

          while($recording=mysqli_fetch_array($result)){
          $product_id=htmlspecialchars($recording['product_id'], ENT_QUOTES, 'UTF-­‐8');
          $company= htmlspecialchars($recording['company'], ENT_QUOTES, 'UTF-­‐8');
          $type=htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-­‐8'); 
          $roast=htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-­‐8');
          $description=htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-­‐8');
          echo "<p>Company: " . $company . "<br/>";
          echo "Type: " . $type. "<br/>";
          echo "Roast: " . $roast . "<br/>";
          echo "Description: " . $description . "<br/> </p>";
}
?>
￼</div>
<div class="footer"><img src="assets/cc_by.png" alt="Creative Commons Licensed By" title="Creative Commons Licensed By"  height="45"/> Izzy Johnston, in conjunction with Girl Develop It! </div>
    </div>
</body>
</html>
