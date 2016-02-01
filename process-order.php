<?php


session_start();
// echo '<pre>';
// print_r($_POST);

// Calculate the total order cost
$grandTotal = 0;

foreach ($_SESSION['cart'] as $product) {
	
	$grandTotal += $product['quantity'] * $product['price'];
}

// Preapre the order in a "pending" state

// Include the PxPay Library
require 'PxPay_Curl.inc.php';