<?php

if(!isset($_SESSION))
{
	session_start();
}

session_destroy();

header("Refresh:0; url=http://localhost/boekenlijst");