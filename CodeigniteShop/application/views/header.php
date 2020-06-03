<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>MVC</title>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>"/>
</head>
<body>
	<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li><a href="<?php echo site_url('index.php/home/index'); ?>">Index</a></li>
<li><a href="<?php echo site_url('index.php/home/itemslist'); ?>">Get All Items</a></li>
<li><a href="<?php echo site_url('index.php/home/getItemInfo'); ?>">Get Item</a></li>
<li><a href="<?php echo site_url('index.php/home/getItemInfo2'); ?>">Select Item</a></li>
<li><a href="<?php echo site_url('index.php/home/selectImages'); ?>">Upload Image</a></li>
<li><a href="<?php echo site_url('index.php/home/selectMultipleImages'); ?>">Multiple upload</a></li>
<li><a href="<?php echo site_url('index.php/home/registration'); ?>">Registration</a></li>
<li><a href="<?php echo site_url('index.php/home/showMap'); ?>">Show map</a></li>
</ul>
</div>
</div>
</nav>

