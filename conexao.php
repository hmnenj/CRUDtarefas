<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "tarefas";

$conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
?>
