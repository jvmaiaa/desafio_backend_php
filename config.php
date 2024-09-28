<?php
    $dbHost = 'localhost';
    $dbPort = '5432';
    $dbUsername = 'postgres';
    $dbPassword = 'root';
    $dbName = 'joao';

    $conexao = pg_connect("host=$dbHost port=$dbPort user=$dbUsername password=$dbPassword dbname=$dbName");

    // if (!$conexao) {
    //     echo "Erro de conexão";
    // }
    // else {
    //   echo "Conexão realizada com sucesso";
    // }
?>