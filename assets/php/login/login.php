<?php

if(!isset($_SESSION)) {
	session_start();
}

require_once('../db/conn.php');

$pdo = new connection;
$con = $pdo->connect();
$name = $_POST['name'];
$password = $_POST['pswd'];

class login {
	public function __construct() {}

	public function login($con, $name, $password) {
		$stmt = $con->prepare("SELECT * FROM `users` WHERE naam = ?");
        $stmt->execute([$name]);
		$user = $stmt->fetch();

		if ($user && password_verify($password, $user['password'])) {
			$_SESSION["name"] = $_POST['name'];
			$_SESSION["loggedIn"] = true;
			echo "Goede gegevens";
			// header("Refresh:0; url=../mainScreen/mainScreen.php");
		} else {
			echo "wrong password or username";
			echo "<button onclick=\"window.location.href='http://localhost/boekenLijst';\">Try again</button>";
		}
	}
}

if (strlen($name) && strlen($password)) {
	$login = new login();
	$login->login($con, $name, $password);
} else {
	echo "Fill out the form";
	echo "<br><br>";
	echo "<button onclick=\"window.location.href='http://localhost/boekenLijst';\">Go back</button>";
}