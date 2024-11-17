<?php
require 'database.php';
$books = $db->query("SELECT * FROM books")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livraria Trioraiva</title>
    <style>
        body { font-family: Arial; text-align: center; background-color: #000000; color:#7B68EE; }
        ul { list-style: none; padding: 0; }
        li { background: #6A5ACDe; margin: 5px; padding: 10px; }
        button { background: #FFD700; color: #000000; border: none; padding: 5px; }
    </style>
</head>
<body>
    <h1>Livraria Trioraiva</h1>
    <h2>Livros Escolhidos</h2>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?php echo "{$book['title']} - {$book['author']} ({$book['year']})"; ?>
                <form action="delete_book.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Adicione Livros</h2>
    <form action="add_book.php" method="POST">
        <input type="text" name="title" placeholder="Título" required>
        <input type="text" name="author" placeholder="Autor" required>
        <input type="number" name="year" placeholder="Ano" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
