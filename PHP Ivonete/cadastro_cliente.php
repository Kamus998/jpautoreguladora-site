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
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
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
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'jp_autoreguladora';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {         
        die('Falha na conexão'. $conn->connect_error);}
        // Receber os dados do formulário
            $nome_cliente = $_POST['nome_cliente'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

// Inserir os dados na tabela 'produtos'
$sql = "INSERT INTO clientes (nome_cliente, cpf, email, telefone)
        VALUES ('$nome_cliente', '$cpf', '$email', '$telefone')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Cliente cadastrado com sucesso!<h2><br>";
    echo "<button onclick=\"window.location.href='index_cliente.php'\">Voltar</button>";
} else {
    echo "Erro ao cadastrar cliente: " . $conn->error;
}


// Fechar a conexão
$conn->close();
?>