<?php



 include 'functions/access.php';


 if (!userIsLoggedIn())
{
	include 'login.html';
	exit();
}

//Połącz z bazą danych
 include 'functions/db.ini.php';


include 'index.html';


