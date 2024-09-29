<?php
  // apenas lógica de encerra sessão e voltar para tela de login
  session_start();
  unset($_SESSION['email']);	
  unset($_SESSION['senha']);
  header('Location: login.php');
?>