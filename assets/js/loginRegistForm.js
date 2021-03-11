function swapLoginRegister() {
	var login = document.getElementById("login-div")
	var register = document.getElementById("register-div")
	if (login.style.display === "none") {
		login.style.display = "block"
		register.style.display = "none"
	} else {
		login.style.display = "none"
		register.style.display = "block"
	}
}