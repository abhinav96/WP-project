function verify() {
	var em = document.getElementById('email').value.toString();
	var pw = document.getElementById('pwd').value.toString();
	var m = em.match(/@ves.ac.in/i);
	if (!m) {
		document.getElementById('error').innerHTML = "Invalid email";
		return false;
	}
	if (pw.length<8) {
		document.getElementById('error').innerHTML = "Invalid password";
		return false;
	}
}