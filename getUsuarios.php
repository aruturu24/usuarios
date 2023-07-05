<?php 

    require_once "conexao.php";

    function getUsuarios() {
        $conn = conectarBanco();
        $sql = "SELECT * FROM usuarios";
        $usuarios = $conn -> query($sql);
        $conn -> close();

        return $usuarios;
    }

    function buscarUsuario($id) {
        $conn = conectarBanco();
        $sql = "SELECT * FROM usuarios WHERE id=$id LIMIT 1";
        $usuario = $conn -> query($sql);
        $conn -> close();

        if ($usuario -> num_rows > 0) {
            return $usuario -> fetch_assoc();
        }
        return null;
    }

    function atualizarUsuario($id, $usuario, $email) {
        $conn = conectarBanco();
        $sql = "UPDATE usuarios SET usuario=?, email=? WHERE id=?";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("ssi", $usuario, $email, $id);

        if ($stmt -> execute()) {
            echo "Dados atualizados com sucesso";
        }else {
            echo "Erro ao atualizar: " . mysqli_error($conn);
        }

        $stmt -> close();
        $conn -> close();
    }

    function excluirUsuario($id) {
        $conn = conectarBanco();
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("i", $id);

        if ($stmt -> execute()) {
            echo "<script>alert('Usuário deletado com sucesso!');</script>";
        }else {
            echo "<script>alert('Erro ao deletar: " . mysqli_error($conn) . "');</script>";
        }

        $stmt -> close();
        $conn -> close();
    }

?>