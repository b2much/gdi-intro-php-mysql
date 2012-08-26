<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="assets/style.css" type="text/css" rel="stylesheet"/>
<title><?php echo $title?></title>
</head>
<?php 
	if ($product_insert==true){
		$insert_product_class="navcurr";
	}
	else {
		$insert_product_class="nav";
	}
	if ($product_show==true){
		$show_product_class="navcurr";
	}
	else {
		$show_product_class="nav";
	}
	if ($company_insert==true){
		$insert_company_class="navcurr";
	}
	else {
		$insert_company_class="nav";
	}
	if ($company_show==true){
		$show_company_class="navcurr";
	}
	else {
		$show_company_class="nav";
	}
	if ($search==true){
		$search_class="navcurr";
	}
	else {
		$search_class="nav";
	}
?>
<body>

    <div class="wrapper">
    	<div class="headline"></div>
        <div class="header"><h1><?php echo $title?></h1></div>
        <div class="navbar"><a href="product_show.php" class='<?php echo $show_product_class?>'>Show Product</a><a href="product_insert.php" class='<?php echo $insert_product_class?>'>Insert Product</a><a href="company_show.php" class='<?php echo $show_company_class?>'>Show Company</a><a href="company_insert.html" class='<?php echo $insert_company_class?>'>Insert Company</a><a href="search.php" class='<?php echo $search_class?>'>Search</a></div>
        <div class="content">