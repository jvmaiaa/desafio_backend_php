<?php

session_start();

  if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    include_once('../backend/database/connection.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = pg_query($conexao, $sql);

    if (pg_num_rows($result) > 0) {
      $user_data = pg_fetch_assoc($result); // recupera dados do usuário
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['nome'] = $user_data['nome']; // salva nome do usuário
      date_default_timezone_set('America/Fortaleza'); // define fuso horário correto
      $_SESSION['inicio_sessao'] = date('m/d/Y H:i'); // Adicionado para armazenar a data e hora de início da sessão
      header('Location: sistema.php');
    } else {
      unset($_SESSION['email']);	
      unset($_SESSION['senha']);
      header('Location: login.php');
    }

  } else {
    header('Location: login.php');
  }
  print_r($_REQUEST);

?>