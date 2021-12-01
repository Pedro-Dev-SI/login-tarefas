<?php

session_start();

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Cadastro</h3>
                    <?php
                    if(isset($_SESSION['ja_cadastrado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário já cadastrado</p>
                    </div>
                    <?php
                    endif;
                    if(isset($_SESSION['cadastrado'])):
                    ?>
                     <div class="notification is-success">
                        <p>Cadastrado com sucesso</p>
                     </div>
                     <?php
                        endif;
                        unset($_SESSION['ja_cadastrado']);
                        unset($_SESSION['cadastrado']);
                     ?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large" placeholder="Nome de usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="confsenha" class="input is-large" type="password" placeholder="Confirme sua senha">
                                </div>
                            </div>

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                            <a href="index.php">Fazer o Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>