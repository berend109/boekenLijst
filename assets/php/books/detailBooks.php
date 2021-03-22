<?php

require_once 'getBooksFromDB.php';

function checkBook($book) {
	print_r($book);
}

$bookFromDB = getBookItem($con, $bookItem);
checkBook($bookFromDB);