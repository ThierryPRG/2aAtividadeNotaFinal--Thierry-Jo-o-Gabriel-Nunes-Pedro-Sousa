<?php
$db = new PDO('sqlite:tarefas.db');
$db->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INTEGER PRIMARY KEY, descricao TEXT, data_vencimento DATE, concluida INTEGER DEFAULT 0
)");
?>
