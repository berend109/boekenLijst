<?php

if (isset($_POST['submit'])) {
	if(!isset($_SESSION)) {
		session_start();
	}

	require_once('../db/conn.php');

	$pdo = new connection;
	$con = $pdo->connect();

	$bookTitle = $_POST['title'];
	$bookAuthor = $_POST['author'];
	$userid = $_SESSION['id'];
	$shortNote = $_POST['shortNote'];
	$owner = $_POST['ownership'];
	$read = $_POST['read'];
	$bookID = uniqid();
	// store image local and get imageDestination variable back with the location.
	require_once('storeBookImage.php');
	$imageLocation = storeBookImage($imageDestination);

	class sendBook
	{
		public function __construct() {}

		public function sendBook($con, $bookTitle, $imageLocation, $bookAuthor, $userid, $shortNote, $owner, $read, $bookID)
		{
			try {
				$stmt = $con->prepare("INSERT INTO `books`(`bookID`, `name`, `author`, `shortNote`, `imageLocation`, `reading`, `ownership`, `usrId`, `dataAdded`) VALUES ('$bookID','$bookTitle','$bookAuthor','$shortNote','$imageLocation','$read','$owner','$userid', now())");
				$stmt->execute();

				header("Refresh:0; url=http://localhost/boekenlijst/assets/php/screen/mainScreen.php");
			} catch (PDOException $e) {
				echo "Something went wrong: " . $e->getMessage();
			}
		}
	}

	if($imageLocation === 0) {
		echo " error<br><br>
		<button onclick=\"window.location.href='http://localhost/boekenlijst/assets/php/screen/mainScreen.php';\">Probeer opnieuw een boek te uploaden</button>";
	} else {
		$reg = new sendBook();
		$reg->sendBook($con, $bookTitle, $imageLocation, $bookAuthor, $userid, $shortNote, $owner, $read, $bookID);
	}

}
