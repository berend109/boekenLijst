function checkLoginForm() {
	let checkName = document.forms['loginForm']['name'].value;
	let checkPSWD = document.forms['loginForm']['pswd'].value;

	if (checkName === '' || checkPSWD === '') {
		alert("Naam of wachtwoord moet nog ingevuld worden");
		return false;
	}
}

function checkRegisterForm() {
	let checkName1 = document.forms['registerForm']['name'].value;
	let checkPSWD1 = document.forms['registerForm']['pswdRegister1'].value;
	let checkPSWD2 = document.forms['registerForm']['pswdRegister2'].value;

	if (checkName1 === '' || checkPSWD1 === '' || checkPSWD2 === '') {
		alert("Alle gegevens dienen ingevuld te worden");
		return false;
	} else if (checkPSWD1 !== checkPSWD2) {
		alert("Wachtwoorden dienen het zelfde te zijn");
		return false;
	}
}

function checkBookForm() {
	let title = document.getElementById('title').value; title.trim();
	let author = document.getElementById('author').value; author.trim();
	let picture = document.getElementById('picture').value; picture.trim();
	let shortNote = document.getElementById('shortNote').value; shortNote.trim();
	if (!title || !author || !picture || !shortNote) {
		alert('Eerst alles invullen graag !!');
		window.location.reload();
		return false;
	}
}