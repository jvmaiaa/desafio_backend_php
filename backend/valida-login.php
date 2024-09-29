<?php
session_start();

//verifica se formulário foi enviado e os campos email e senha estão preechidos
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) { 

    //conecta com o banco e verifica email e senha, removendo espaços
    include_once('../backend/database/connection.php'); 
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    //consulta para buscar o usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = $1";
    $result = pg_query_params($conexao, $sql, array($email));

    //se email existe, busca usuaario e senha criptografada 
    if (pg_num_rows($result) > 0) {
        $user_data = pg_fetch_assoc($result); //recupera dados do usuário
        $senha_criptografada = $user_data['senha'];  //senha criptografada do banco de dados

        /*verifica se a senha informada corresponde à senha armazenada (criptografada).
        essa verificação é feita através de um algoritmo de hashing utilizado na criação 
        da hash para verificar se a senha informada produz a mesma hash*/
        if (password_verify($senha, $senha_criptografada)) {
            //dado são armazenados em sessão
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $user_data['nome'];
            date_default_timezone_set('America/Fortaleza'); //define fuso horário correto
            $_SESSION['inicio_sessao'] = date('m/d/Y H:i');
            header('Location: sistema.php');
        } else {
            unset($_SESSION['email']);
            header('Location: login.php?erro=1');
        }
    } else {
        //email não encontrado
        unset($_SESSION['email']);
        header('Location: login.php?erro=1');
    }
} else {
    //campos vazio
    header('Location: login.php?erro=1');
}
?>
