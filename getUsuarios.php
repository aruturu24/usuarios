<?php 

    require_once "conexao.php";

    function getUsuarios() {
        $conn = conectarBanco();
        $sql = "SELECT * FROM usuarios";
        $usuarios = $conn -> query($sql);
        $conn -> close();

        return $usuarios;
    }

?>