<?php
include_once "conexao.php";
$msg = $_GET['msg'] ?? '';

$select = $conexao->prepare("SELECT * FROM tarefas");
$select->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listar.css">
    <title>Lista de Tarefas</title>
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
    <h1>Lista de Tarefas</h1>

    <table border="2">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php 
        while($tarefa = $select->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $tarefa['id'] ?></td>
                <td><?= $tarefa['titulo'] ?></td>
                <td><?= $tarefa['descricao'] ?></td>
                <td><?= $tarefa['status'] ?></td>
                <td>
                    <a href="alterar.php?id=<?= $tarefa['id'] ?>">Editar</a>
                    <a href="excluir.php?id=<?= $tarefa['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <footer>
        <p><?= $msg ?></p>
    </footer>

    </div>
</body>
</html>
