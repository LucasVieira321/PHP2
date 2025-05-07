<?php

$conn = new mysqli("localhost", "root", "", "livraria");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conectado com sucesso <br><br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $ano_nascimento = $_POST['ano_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];


    $sql = "INSERT INTO autor (nome, cpf, ano_nascimento, cidade, estado) 
            VALUES ('$nome', '$cpf', '$ano_nascimento', '$cidade', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Cadastro realizado com sucesso!</h3>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>CPF:</strong> $cpf</p>";
        echo "<p><strong>Ano de Nascimento:</strong> $ano_nascimento</p>";
        echo "<p><strong>Cidade:</strong> $cidade</p>";
        echo "<p><strong>Estado:</strong> $estado</p>";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>

<h2><a href="cadastro_livro.html">Ir para o cadastro de livros</a></h2>
<h2><a href="cadastro_autor.html">Voltar ao cadastro de autor</a></h2>
