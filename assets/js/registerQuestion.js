let nicknameInputField = document.getElementById("nicknameInputField").value;

if (nicknameInputField) {
    var answer = window.confirm("Geen gebruiker gevonden met deze naam, Registreren ?");

    if(!(answer)) { window.location.href = 'http://localhost/boekenlijst/'; }
}
