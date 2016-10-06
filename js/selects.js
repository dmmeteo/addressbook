$(document).ready(function () {
/*
 * check changes in country_id selector
 */
$('#country_id').change(function () {
		var country = $(this).val();
		/*
		* if country_id not set
		* do nothing
		*/
		if (country == '0') {
			$('#city_id').html('<option>--Select City--</option>');
			$('#city_id').attr('disabled', true);
			return(false);
		}
		$('#city_id').attr('disabled', true);
		$('#city_id').html('<option>loading...</option>');

		// url for request
		var url = '../data/city.ajax.php';
		/*
		* make get request
		*/
		$.get(
			url,
			"country=" + country,

			function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				/*
				* if result true
				* function each()
				*/
				else {
					var options = '';
					$(result.citys).each(function() {
						options += '<option value="' + $(this).attr('title') + '">' + $(this).attr('title') + '</option>';
					});

					$('#city_id').html('<option value="0">--Select City--</option>'+options);
					$('#city_id').attr('disabled', false);
				}
			},
			"json"
		);
	});
});