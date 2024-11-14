<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "jp_autoreguladora";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];


    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if ($tipo == "produto") {
            $verificar = $conexao->prepare("DELETE FROM produtos WHERE id = ?");
            if ($verificar === false) {
                die("Erro na preparação da consulta: " . $conexao->error);
            }

            $verificar->bind_param("i", $id);

            if ($verificar->execute()) {
                echo "<h1>Produto Deletado</h1>";
            } else {
                echo "Erro ao deletar produto: " . $verificar->error;
            }

            $verificar->close();
        } elseif ($tipo == "cliente") {
            $verificar = $conexao->prepare("DELETE FROM clientes WHERE id = ?");
            if ($verificar === false) {
                die("Erro na preparação da consulta: " . $conexao->error);
            }

            $verificar->bind_param("i", $id);

            if ($verificar->execute()) {
                echo "<h1>Cliente Deletado</h1>";
            } else {
                echo "Erro ao deletar cliente: " . $verificar->error;
            }

            $verificar->close();
        } else {
            echo "Tipo de cadastro inválido!";
        }
    } else {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        if (empty($nome)) {
            die("O nome é obrigatório.");
        }

        if ($tipo == "produto") {
            $preco = $_POST['preco'];

            if (!is_numeric($preco) || $preco < 0) {
                die("Preço inválido.");
            }

            $verificar = $conexao->prepare("INSERT INTO produtos (nome, descricao, preco) VALUES (?, ?, ?)");
            if ($verificar === false) {
                die("Erro na preparação da consulta: " . $conexao->error);
            }

            $verificar->bind_param("ssd", $nome, $descricao, $preco);

            if ($verificar->execute()) {
                echo "<h1>Produto cadastrado com sucesso!</h1>";
                echo "<p><strong>Nome:</strong> $nome</p>";
                echo "<p><strong>Descrição:</strong> $descricao</p>";
                echo "<p><strong>Preço:</strong> R$ $preco</p>";
            } else {
                echo "Erro ao cadastrar produto: " . $verificar->error;
            }

            $verificar->close();
        } elseif ($tipo == "cliente") {
            $email = $_POST['email'];

            if (empty($email)) {
                die("O e-mail é obrigatório para clientes.");
            }

            $verificar = $conexao->prepare("INSERT INTO clientes (nome, descricao, email) VALUES (?, ?, ?)");
            if ($verificar === false) {
                die("Erro na preparação da consulta: " . $conexao->error);
            }

            $verificar->bind_param("sss", $nome, $descricao, $email);

            if ($verificar->execute()) {
                echo "<h1>Cliente cadastrado com sucesso!</h1>";
                echo "<p><strong>Nome:</strong> $nome</p>";
                echo "<p><strong>Descrição:</strong> $descricao</p>";
                echo "<p><strong>Email:</strong> $email</p>";
            } else {
                echo "Erro ao cadastrar cliente: " . $verificar->error;
            }

            $verificar->close();
        } else {
            echo "Tipo de cadastro inválido!";
        }
    }
} else {
    echo "Método de envio inválido!";
}
