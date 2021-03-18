<?php

require_once 'getBooksFromDB.php';

function checkBook($books) 
{
	foreach ($books as $book) {
		displayBook($book);
	}
}

function displayBook($book)
{
	if(!$book) {
		echo 'test';
	} else {

		echo '<div class="card mb-3" style="max-width: 540px;">';
		echo '<div class="row g-0">';
			echo '<div class="col-md-4">';
			echo '<img src="..." alt="...">';
			echo '</div>';
			echo '<div class="col-md-8">';
			echo '<div class="card-body">';
				echo '<h5 class="card-title">Card title</h5>';
				echo '<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>';
				echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
			echo '</div>';
			echo '</div>';
		echo '</div>';
		echo '</div>';

	}
}

$bookFromDB = getBook($con, $books);
checkBook($bookFromDB);
