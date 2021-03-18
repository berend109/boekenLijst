<?php

if(!isset($_SESSION)) {
	session_start();
}

require_once('../db/conn.php');

$pdo = new connection;
$con = $pdo->connect();

$books = array();

function getBook($con, $books)
{
	try {
		$userid = $_SESSION['id'];

		$stmt = $con->prepare("SELECT * FROM `books` WHERE `usrId` = ?");
		$stmt->execute([$userid]);

		foreach (($stmt->fetchAll()) as $bookArray) {
			array_push($books, $bookArray);
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	return $books;
}
