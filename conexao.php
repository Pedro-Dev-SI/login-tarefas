<?php

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DBNOME', 'pedroselvate_atividade');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DBNOME) or die ('Erro na conexão');