<?php
session_start();
include('conexao.php');

//!EU SÓ QUERO QUE ESSA PÁGINA SEJA ACESSÍVEL APÓS OS DOIS CAMPOS FOREM PREENCHIDOS 
//*Se o valor dos dois campos ou só de um estiver vazio será redirecionado para a mesma página
if(empty($_POST['usuario']) || empty($_POST['senha'])){
   header('Location: index.php');
   exit();
}

//*Evitando ataques de sql_injection
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//!VERIFICANDO AUTENTICAÇÃO
$query = "SELECT usuario_id, usuario FROM usuarios WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";

//*Resultando a query
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1){
   $dados = mysqli_fetch_array($result);
   $_SESSION['usuario_id'] = $dados['usuario_id'];
   $_SESSION['usuario'] = $usuario;
   header('Location: painel.php');
   exit();
}else{
   $_SESSION['nao_autenticado'] = true;
   header('Location: index.php');
   exit();
}






