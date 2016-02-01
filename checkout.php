<?php


session_start();
// Include header template
include 'templates/header.template.php';

// Display contents of the cart
include 'templates/cart-contents.template.php';


// Checkout form

include 'templates/checkout-form.template.php';



// Footer
include 'templates/footer.template.php';