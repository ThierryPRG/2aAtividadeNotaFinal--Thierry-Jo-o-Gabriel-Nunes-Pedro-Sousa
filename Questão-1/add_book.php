<?php
require 'database.php';
if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['year'])) {
    $stmt = $db->prepare("INSERT INTO books (title, author, year) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['year']]);
}
header("Location: index.php");
?>
