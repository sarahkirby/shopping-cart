<?php

// Connect to database
$dbc = new mysqli('localhost', 'root', '', 'ajax_cities_suburbs');

// Filter the data
// Capture and save the chosen city ID
$cityID = $dbc->real_escape_string( $_GET['city'] );

// Prepare SQL
$sql = "SELECT suburbID, suburbName FROM suburbs WHERE cityID = $cityID";

// Run the query and capture the result
$result = $dbc->query( $sql );

// Extract the result
$suburbs = json_encode( $result->fetch_all(MYSQLI_ASSOC) );

// Prepare the header to say we are about to send JSON, not text
header('Content-Type: application/json');

echo $suburbs;


















