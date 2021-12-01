<?php

include('conexao.php');
session_start();

$id = $_SESSION['tarefa_id'];

$query = "DELETE FROM tarefas WHERE tarefa_id = $id";
mysqli_query($conexao, $query);

header('Location: painel.php');

?>