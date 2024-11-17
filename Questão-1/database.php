<?php
$db = new PDO('sqlite:livraria.db');
$db->exec("CREATE TABLE IF NOT EXISTS books (id INTEGER PRIMARY KEY, title TEXT, author TEXT, year INTEGER)");
?>
