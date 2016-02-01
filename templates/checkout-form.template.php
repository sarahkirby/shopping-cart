<h2>Please fill out your details in the form below</h2>

<form action="process-order.php" method="POST">

<div>
	<label for="full-name">Full Name: </label>
	<input type="text" id="full-name" name="full-name" placeholder="Bob Smith">
</div>

	<select name="cities" id="cities">
		<option value="">Please select a city...</option>
		<?php

			// Connect to database
			$dbc = new mysqli('localhost', 'root', '', 'ajax_cities_suburbs');

			// Get all the cities
			$sql = "SELECT cityID, cityName FROM cities";

			// Run the query and capture the results
			$result = $dbc->query( $sql );

			// Loop over the results and create an option element for each
			while( $city = $result->fetch_assoc() ) {

				echo '<option value="'.$city['cityID'].'">'.$city['cityName'].'</option>';

			}

		?>
	</select>

	<select name="suburbs" id="suburbs"></select>

	<div>
		<label for="address">Address: </label>
		<textarea name="address" id="address" cols="30" rows="10" placeholder="5 Hamilton Street"></textarea>
	</div>

	<div>
		<label for="phone">Phone Number: </label>
		<input type="tel" id="phone" name="phone">
	</div>

	<div>
		<label for="email">Email: </label>
		<input type="email" name="email" id="email" placeholder="example@example.com">
	</div>

	<input type="submit" name="place-order" value="Place Order">

	



</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/cities-and-suburbs.js"></script>
