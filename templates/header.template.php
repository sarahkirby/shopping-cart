<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shoppin Cart</title>
</head>
<body>

<?php

// Show the contents of the cart
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';

?>