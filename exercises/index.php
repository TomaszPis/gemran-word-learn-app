<?php

include '../functions/db.ini.php';


$sql = "SELECT * FROM words a
		INNER JOIN word_category b
		ON a.id_word = b.id_word
		INNER JOIN category c
		ON b.id_cat = c.id_cat
		ORDER BY RANDOM()
		LIMIT 1";
$words = pg_query($sql);
$word = pg_fetch_array($words);

include_once 'index.html';





