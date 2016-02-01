  <?php

  // Start the session
  session_start();

  // Connect to the database
  $dbc = new mysqli('localhost', 'root', '', 'shopping_cart');

  // Create a cart if they don't have one already
  if(!isset($_SESSION['cart'])) {

    // Create the cart. If you don't have a cart create one.
    $_SESSION['cart'] = [];

  }


  // If clearcart is in the GET array
  if (isset($_GET['clearcart'])) {
    
    // Clear the cart
    $_SESSION['cart'] = [];

    // Refresh the page
    header('Location: index.php');
  }

  // Did the User submit a form? add to cart is name of submit form
  if (isset($_POST['add-to-cart'])) {

    // Find out the price of the product
    $id = $dbc->real_escape_string($_POST['product-id']);

    // Prepare sql to find the price of the product
    $sql = "SELECT price FROM products WHERE id = $id";

    // Run the query
    $result = $dbc->query($sql);

    // Validation goes here

    // Extract the data
    $result = $result->fetch_assoc();

    $productFound = false;

    // Loop over the cart an see if this product is added already
    for ($i=0; $i < count($_SESSION['cart']); $i++) { 

      // Get the ID of the product in the cart. $i is single product with all infomation
      $cartItemID = $_SESSION['cart'][$i]['id'];

      // Get the ID of the product being added to the cart
      $addItemID = $_POST['product-id'];

      // If the two IDs match
      if ($cartItemID == $addItemID) {
        
        $_SESSION['cart'][$i]['quantity'] += $_POST['quantity'];
        $productFound = true;

      }
      
    }

    // If the product was not found in the cart. or (!$productFound)
    if ($productFound == false) {
      
    


    
    // Add the item to the cart
    $_SESSION['cart'][] = [
      'id' => $_POST['product-id'],
      'name' => $_POST['name'],
      'description' => $_POST['description'],
      'price' => $result['price'],
      'quantity' => $_POST['quantity']
    ];

    }

  }



  include 'templates/header.template.php';

  ?>

  <h1>Products</h1>

  <?php


  // Get all the products from the database
  $sql = "SELECT id, name, description, price, stock FROM products";

  // Run the query
  $result = $dbc->query($sql);

  // Loop over the result. 
  while ($row = $result->fetch_assoc()) {
    
    // Include product template
    include 'templates/product.template.php';

  }

  include 'templates/footer.template.php';

  ?>

