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

		$bookTitle = $book['name'];
		$bookAuthor = $book['author'];
		$bookOwnership = $book['ownership'];
		$bookReading = $book['reading'];
		$bookShortNote = $book['shortNote'];
		$bookImageLocation = $book['imageLocation'];

		echo '
		<div class="row">
			<div class="col-10 ">
				<div class="card mb-3" id="bookCard">
					<div class="row g-0">
						<div class="col-md-4">
							<div class="card-header">
							Boek foto
							</div>
							<img id="bookImage" src="'. $bookImageLocation .'" alt="Book cover">
						</div>
						<div class="col-md-4">
							<div class="card-header">
							Details
							</div>
							<div class="card-body">
								<h5 class="card-title">Titel: '. $bookTitle .'</h5>
								<h5 class="card-title">Auteur: '. $bookAuthor .'</h5>
								<h5 class="card-title">Bezit: '. $bookOwnership .'</h5>
								<h5 class="card-title">Lezen: '. $bookReading .'</h5>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card-header">
							Korte notitie
							</div>
							<div class="card-body">						
								<p class="card-text">'. $bookShortNote . '</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="d-grid gap-2">
					<button type="button" class="btn btn-success">Aanpassen</button>
					<button type="button" class="btn btn-info">Details</button>
					<button type="button" class="btn btn-danger">Verwijderen</button>
				</div>
			</div>
		</div>
		';

	}
}

$bookFromDB = getBook($con, $books);
checkBook($bookFromDB);
