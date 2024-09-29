<?php
  session_start();
  if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true) {
    unset($_SESSION['email']);	
    unset($_SESSION['senha']);
    header('Location: login.php');
  }
  $nome = $_SESSION['nome'];
  $inicio_sessao = $_SESSION['inicio_sessao'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- insere bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../frontend/sistema.css">
  <title>Sistema</title>

</head>
<!-- Exibe a tela do sistema com informações do usuário cadastrado -->
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CADASTRADO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="d-flex">
          <a href="sair.php" class="btn btn-danger me-5">Sair</a>
      </div>
  </nav>
  <div class="bem-vindo">
  <?php
    echo "<h1>Bem-vindo, <u>$nome</u></h1>
      <p>Você está conectado desde $inicio_sessao</p>
    ";
  ?>
  </div>

</body>
</html>