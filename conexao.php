<?php

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'pedroselvate_atividade');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Erro na conexão');