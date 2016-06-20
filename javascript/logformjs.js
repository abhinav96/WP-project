$(document).ready(function() {
	$('#loginform').submit(function(event) {
		var reg = new RegExp('ves.ac.in');
		if (reg.test($('#email').val())) {
			if($('#pwd').val().length < 8){
				$('#error').html('Invalid Password');
				event.preventDefault();
			}
		}
		else{
			$('#error').html('Invalid Email');
			event.preventDefault();
		}
	});
});