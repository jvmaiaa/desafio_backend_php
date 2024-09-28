<?php

session_start();

  if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // require_once('config.php');
    // $email = $_POST['email'];
    // $senha = $_POST['senha'];
    // $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    // $result = pg_query($conexao, $query);
    // $row = pg_fetch_assoc($result);
    // if ($row) {
    //   echo "Login realizado com sucesso";
    // } else {
    //   echo "Email ou senha incorretos";
    // }
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // print_r('Email: ' . $email);
    // print_r('Senha: ' . $senha);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = pg_query($conexao, $sql);

    // print_r($result);
    // print_r($sql);

    if (pg_num_rows($result) > 0) {
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
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