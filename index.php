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

  // Did the User submit a form?
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
    
    // Add the item to the cart
    $_SESSION['cart'][] = [
      'id' => $_POST['product-id'],
      'name' => $_POST['name'],
      'description' => $_POST['description'],
      'price' => $result['price']
      ];



  }



  include 'templates/header.template.php';

  ?>

  <h1>Products</h1>

  <?php


  // Get all the products from the database
  $sql = "SELECT id, name, description, price, stock FROM products";

  // Run the query
  $result = $dbc->query($sql);

  // Loop over the result
  while ($row = $result->fetch_assoc()) {
    
    // Include product template
    include 'templates/product.template.php';

  }

  include 'templates/footer.template.php';

  ?>

