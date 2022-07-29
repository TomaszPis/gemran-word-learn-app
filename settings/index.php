<?php

include_once '../functions/access.php';


 if (!userIsLoggedIn())
{
	include '../login.html';
	exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Dodaj słówko') {
	
	$word_pl = $_POST['word_pl'];
	$word_de = $_POST['word_de'];

	$sql = "INSERT INTO words VALUES
			(DEFAULT, '{$word_pl}', '{$word_de}' );";
	pg_query($sql);




	$sql2 = "SELECT * FROM words
			 WHERE word_pl = '{$word_pl}';";
	$words = pg_query($sql2);
	$word = pg_fetch_array($words);




	$id_cat =  $_POST['id_cat'];
	$id_word = $word['id_word'];
	
	$sql4 = $sql = "INSERT INTO word_category VALUES
			({$id_word}, {$id_cat});";
	pg_query($sql4);
}

if (isset($_POST['action']) and $_POST['action'] == 'Dodaj kategorię'){

	$category_add = $_POST['category_add'];

	$sql = "INSERT INTO category VALUES
			(DEFAULT, '{$category_add}');";
	pg_query($sql);
}


$sql = "SELECT * FROM category";
$category = pg_query($sql);
$cat = pg_fetch_all($category);

include_once 'index.html';





