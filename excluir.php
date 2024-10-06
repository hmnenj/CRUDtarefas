<?php
include_once "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $delete = $conexao->prepare("DELETE FROM tarefas WHERE id = :id");
    $delete->bindParam(':id', $id);

    if ($delete->execute()) {
        header('Location: listar_tarefas.php?msg=Tarefa excluída com sucesso!');
    } else {
        header('Location: listar_tarefas.php?msg=Erro ao excluir a tarefa.');
    }
}
?>
