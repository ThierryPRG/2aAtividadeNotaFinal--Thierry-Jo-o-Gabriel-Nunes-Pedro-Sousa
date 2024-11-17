<?php
require 'database.php';
if (!empty($_POST['id'])) {
    $stmt = $db->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$_POST['id']]);
}
header("Location: index.php");
?>
