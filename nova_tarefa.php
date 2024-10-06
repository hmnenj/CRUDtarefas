<?php
include_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $insert = $conexao->prepare("INSERT INTO tarefas (titulo, descricao, status) VALUES (:titulo, :descricao, :status)");
    $insert->bindParam(':titulo', $titulo);
    $insert->bindParam(':descricao', $descricao);
    $insert->bindParam(':status', $status);

    if ($insert->execute()) {
        header('Location: listar_tarefas.php?msg=Tarefa cadastrada com sucesso!');
    } else {
        header('Location: nova_tarefa.php?msg=Erro ao cadastrar a tarefa.');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nova.css">
    <title>Nova Tarefa</title>
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
        <h1>Adicionar Nova Tarefa</h1>

        <form action="nova_tarefa.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required><br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required></textarea><br>

            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="pendente">Pendente</option>
                <option value="concluída">Concluída</option>
            </select><br>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>