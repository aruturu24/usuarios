<?php 

    require_once "getUsuarios.php";

    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    
    $usuario = buscarUsuario($id);

    if (!$usuario) {
        echo "Usuário não encontrado";
        exit();
    }

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter os dados do formulário
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];

        // Atualizar os dados do usuário no banco de dados
        atualizarUsuario($id, $usuario, $email);

        // Redirecionar para a página de listagem de usuários
        header("Location: todosUsuarios.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mt-5 mb-4">Editar usuário</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="usuario">Usuário:</label>
                        <input 
                            type="text" 
                            class="form-control"
                            name="usuario" 
                            id="usuario" 
                            value="<?php echo $usuario['usuario'] ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input 
                            type="text" 
                            class="form-control"
                            name="email" 
                            id="email" 
                            value="<?php echo $usuario['email'] ?>"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>