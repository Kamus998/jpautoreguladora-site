<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        *{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        body {
            background-image: url('img/mercedes.jpg') ;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 300px;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</body>
</html>
<?php
// Conexão com o banco de dados
$servername = "localhost"; // Nome do servidor (geralmente é 'localhost')
$username = "root";        // Usuário do banco de dados
$password = "";            // Senha do banco de dados (preencha se tiver)
$dbname = "jp_autoreguladora";        // Nome do banco de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, database: $dbname);

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$nome_produto = $_POST['nome_produto'];
$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

// Inserir os dados na tabela 'produtos'
$sql = "INSERT INTO produtos (nome_produto, descricao, quantidade, preco, categoria) 
        VALUES ('$nome_produto', '$descricao', $quantidade, '$preco', '$categoria')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Produto cadastrado com sucesso!<h2><br>";
    echo "<button onclick=\"window.location.href='index.php'\">Voltar</button>";
} else {
    echo "Erro ao cadastrar produto: " . $conn->error;
}


// Fechar a conexão
$conn->close();
?>
