<?php
require 'database.php';
$tarefas = $db->query("SELECT * FROM tarefas ORDER BY data_vencimento")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tarefas</title>
    <style>
        body { font-family: Arial;
        background-color: #000000; color:#6A5ACD; 
        margin: 20px; }
        input, button { padding: 8px; }
        button { background: #FFD700; color: black; border: none; }
        ul { padding: 0; list-style: none; }
        li { margin: 5px 0; padding: 8px; border: 1px solid #ddd; background: #000000; }
        a { color: #8B0000; }
    </style>
</head>
<body>
    <h1>Tarefas</h1>
    <form action="add_tarefa.php" method="POST">
        <input name="descricao" placeholder="Descrição" required>
        <input type="date" name="data_vencimento" required>
        <button>Adicionar</button>
    </form>

    <h2>Pendentes</h2>
    <ul>
        <?php foreach ($tarefas as $t): ?>
            <?php if (!$t['concluida']): ?>
                <li><?= htmlspecialchars($t['descricao']) ?> - <?= $t['data_vencimento'] ?>
                    <a href="update_tarefa.php?id=<?= $t['id'] ?>">Concluir</a>
                    <a href="delete_tarefa.php?id=<?= $t['id'] ?>">Excluir</a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <h2>Concluídas</h2>
    <ul>
        <?php foreach ($tarefas as $t): ?>
            <?php if ($t['concluida']): ?>
                <li><?= htmlspecialchars($t['descricao']) ?> - <?= $t['data_vencimento'] ?> (Concluída)
                    <a href="delete_tarefa.php?id=<?= $t['id'] ?>">Excluir</a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
