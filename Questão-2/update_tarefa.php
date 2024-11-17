<?php
require 'database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
