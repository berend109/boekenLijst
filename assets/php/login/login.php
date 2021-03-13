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
			header("Refresh:0; url=http://localhost/boekenLijst/assets/php/screen/mainScreen.php");
		} elseif ($user) {
			echo "<p style='text-align: center'>wrong password</p>";
			echo "<br><br>";
			echo "<div style='text-align: center;'>";
			echo "<button style='position: absolute;' onclick=\"window.location.href='http://localhost/boekenLijst';\">Terug</button>";
			echo "</div>";
		} else {
			$_SESSION["name"] = $_POST['name'];
			header("Refresh:0; url=../screen/registerScreen.php");
		}
	}
}

if (strlen($name) && strlen($password)) {
	$login = new login();
	$login->login($con, $name, $password);
} else {
	echo "<p style='text-align: center'>Niet alles is ingevuld</p>";
	echo "<br><br>";
	echo "<div style='text-align: center;'>";
	echo "<button style='position: absolute;' onclick=\"window.location.href='http://localhost/boekenLijst';\">Terug</button>";
	echo "</div>";
}