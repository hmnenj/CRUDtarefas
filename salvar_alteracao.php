<?php
include_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $update = $conexao->prepare("UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status WHERE id = :id");
    $update->bindParam(':titulo', $titulo);
    $update->bindParam(':descricao', $descricao);
    $update->bindParam(':status', $status);
    $update->bindParam(':id', $id);

    if ($update->execute()) {
        header('Location: listar_tarefas.php?msg=Tarefa alterada com sucesso!');
    } else {
        header('Location: listar_tarefas.php?msg=Erro ao alterar a tarefa.');
    }
}
?>
