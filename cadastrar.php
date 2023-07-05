<?php 

require_once "conexao.php";
# Coloca as informações do form nas variáveis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["newUsername"];
    $email = $_POST["newEmail"];
    $password = $_POST["newPassword"];

    # Chama a função de cadastrar o usuário com as informações do form 
    cadastrarUsuario($username, $email, $password);
}

# Cadastra um novo usuário no banco de dados
function cadastrarUsuario($username, $email, $password) {
    # Faz a conexão com o banco de dados
    $conn = conectarBanco();

    # Query SQL para verificar se já existe o usuário cadastrado
    $sql = "SELECT * FROM usuarios WHERE usuario='$username' AND senha='$password'";
    $resultado = $conn -> query($sql);
    if ($resultado -> num_rows > 0) {
        # Caso ache um usuário, retorna um erro
        echo "Usuário já existente.\n";
    } else {
        # Caso não tenha usuário, adiciona no banco de dados
        $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES ('$username', '$password', '$email')";
        $resultado = $conn -> query($sql);

        if ($resultado == true) {
            # Caso crie o usuário com sucesso, retorna uma mensagem
            echo "<script>alert('Usuário criado!')</script>";
        }else {
            # Caso dê erro ao criar usuário, retorna um erro
            echo("Erro: " . mysqli_connect_error());
        
        }
    }

    
}

?>