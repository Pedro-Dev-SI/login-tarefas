<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$query = "SELECT tarefa_id, nome FROM tarefas WHERE usuario_id = {$_SESSION['usuario_id']}";

$result = mysqli_query($conexao, $query);
$data = mysqli_fetch_array($result);
$_SESSION['tarefa_id'] = $data['tarefa_id'];
$idUsuario = $_SESSION['usuario_id'];
$warnings = array();
$_SESSION['no_tasks'] = false;

if(isset($_POST['add-task'])){
   $taskName = $_POST['task-input'];

   if(empty($taskName)){
      $warnings = "Favor informar a tarefa";
      $_SESSION['no_tasks'] = true;
   }else{
      $queryInsert = "INSERT INTO tarefas (usuario_id, nome) VALUES ('{$idUsuario}', '{$taskName}');";
      mysqli_query($conexao, $queryInsert);
      $_SESSION['no_tasks'] = false;
      header('Location: painel.php');
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <link rel="stylesheet" href="css/bulma.min.css" />
   <link rel="stylesheet" href="./css/painel.css"/>
   <title>Painel Principal</title>
</head>
<body>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="./img/task.png" width="30" height="50" alt="task logo">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="painel.php">
        Home
      </a>

      <a class="navbar-item">
        Documentation
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-danger" href="logout.php">
            Sair
          </a>
        </div>
      </div>
    </div>

  </div>
</nav>

   <div class="tasks-container">
      <h1 class="greetings">Seja Bem Vindo(a) <?php echo $_SESSION['usuario'];?></h1>
      <h2 class="task-title">Tarefas a fazer</h2>

      <?php if($_SESSION['no_tasks'] == true){
      ?>
         <div class="warnings">
            <p><?php echo $warnings ?></p>
         </div>
      <?php
      }?>

      <form method="POST" action="" class="form-task">
         <input name="task-input" name="text" class="input is-large" id="input-tasks" placeholder="Informe aqui uma tarefa..." autofocus="">
         <button type="submit" id="add-task" class="button is-block is-link is-large" name="add-task">Adicionar</button>
      </form>

      <section class="tasks-list">
         <ul>
            <?php
               
               if(!empty($data)){

                  do{
            ?>
                     <li class="task-items">
                        <?= $data['nome'] ?>
                        <a class="button is-danger" href="deletarTarefa.php">
                           Deletar
                        </a>
                     </li>
            <?php
                  }while($data = mysqli_fetch_array($result));
               }
            ?>
         </ul>
      </section>
      

   </div>

   
</body>
</html>

