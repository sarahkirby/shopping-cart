$(document).ready(function(){

	// Listen for a change event on the cities select element
	$('#cities').change(function(){

		// Get the ID of the chosen city
		var cityID = $(this).val();

		// Basic validation
		if( cityID == '' ) { return; }

		// AJAX
		$.ajax({

			url: 'api/cities-and-suburbs.php',
			data: {
				city: cityID
			},
			success: function( dataFromServer ){

				console.log(dataFromServer);

				// Clear any old results from the suburbs select element
				$('#suburbs').html('');

				// Loop over the results
				for( var i=0; i<dataFromServer.length; i++ ) {

					$('#suburbs').append('<option value="'+dataFromServer[i].suburbID+'">'+dataFromServer[i].suburbName+'</option>');

				}

			},
			error: function() {
				alert('Something went wrong');
			}

		});
		

	});

});