<?php
require 'database.php';
$db->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (?, ?)")
   ->execute([$_POST['descricao'], $_POST['data_vencimento']]);
header("Location: index.php");
?>
