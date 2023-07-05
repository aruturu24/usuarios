<?php

    require_once "getUsuarios.php";

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $usuario = buscarUsuario($id);

        if (!$usuario) {
            die("Usuário não existente!");
        }

        excluirUsuario($id);
        header("Location: todosUsuarios.php");
    }

?>