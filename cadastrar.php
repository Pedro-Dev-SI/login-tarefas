<?php

session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['confsenha'])){
   header('Location: cadastro.php');
   exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$confsenha = mysqli_real_escape_string($conexao, $_POST['confsenha']);

$query = "SELECT usuario_id FROM usuarios WHERE usuario = '{$usuario}';";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row > 0){
   $_SESSION['ja_cadastrado'] = true;
   header('Location: cadastro.php');
   exit();
}else{
   $queryInsert = "INSERT INTO usuarios (usuario, senha) VALUES ('{$usuario}', md5('{$senha}'));";
   mysqli_query($conexao, $queryInsert);
   $_SESSION['cadastrado'] = true;
   header('Location: cadastro.php');
   exit();
}

