<?php
include_once "conexao.php";

$id = $_GET['id'] ?? '';
$select = $conexao->prepare("SELECT * FROM tarefas WHERE id = :id");
$select->bindParam(':id', $id);
$select->execute();
$tarefa = $select->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nova.css">
    <title>Alterar Tarefa</title>
</head>

<body>

    <header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="nova_tarefa.php">Adicione uma Tarefa</a>
            <a href="listar_tarefas.php">Veja Tarefas Existentes</a>
        </nav>
    </header>

    <div class="container">
        <h1>Alterar Tarefa</h1>

        <form action="salvar_alteracao.php" method="post">
            <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?= $tarefa['titulo'] ?>" required><br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required><?= $tarefa['descricao'] ?></textarea><br>

            <label for="status">Status:</label>
            <select name="status">
                <option value="pendente" <?= $tarefa['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                <option value="concluída" <?= $tarefa['status'] == 'concluída' ? 'selected' : '' ?>>Concluída</option>
            </select><br>

            <button type="submit">Salvar Alteração</button>
        </form>
    </div>
</body>

</html>