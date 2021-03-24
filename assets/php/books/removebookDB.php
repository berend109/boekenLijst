<?php

require_once '../db/conn.php';

session_start();

$mainScreen = 'http://localhost/boekenlijst/assets/php/screen/mainScreen.php';

$pdo = new connection;
$con = $pdo->connect();

$bookToRemove = htmlspecialchars($_GET["bookID"]);

try {
	$sql = "DELETE FROM `books` WHERE `bookID` = ('$bookToRemove')"; 
	$con->exec($sql);
	header("Refresh:0; url=http://localhost/boekenlijst/assets/php/screen/mainScreen.php");
} catch (PDOException $e) {
	echo $sql . "<br>". $e->getMessage();
	echo("<button onclick=\"location.href='http://localhost/boekenlijst/assets/php/screen/mainScreen.php'\">Back to Home</button>");
}