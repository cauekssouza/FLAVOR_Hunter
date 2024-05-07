<?php
$servidor = "localhost:3307"; 
$usuario = "root"; 
$senha = "2204ckss"; 
$banco = "cadastro"; 

// Conexão com o banco de dados
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

echo "Conexão bem-sucedida!";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos foram preenchidos
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
        // Obtém os valores do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Prepara a consulta SQL para inserir os dados
        $sql = "INSERT INTO cadastro (Nome, Email, Senha) VALUES ('$nome', '$email', '$senha')";

        // Executa a consulta SQL
        if (mysqli_query($conn, $sql)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
}

// Fechar conexão com o banco de dados
mysqli_close($conn);
?>
