<?php

if(!isset($_SESSION)) {
	session_start();
}

require_once('../db/conn.php');

echo $_SESSION['title'];
echo "<br><br>";
echo $_SESSION['author'];

echo "test";

