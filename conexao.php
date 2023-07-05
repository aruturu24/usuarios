<?php

conectarBanco();

function conectarBanco() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "login";
    $port       = 3307;

    // Criar conexão com banco
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn -> connect_error) {
        die("Conexão falhou: " . $conn -> connect_error);
    }

    $conn -> set_charset("utf8");
    return $conn;
}

?>