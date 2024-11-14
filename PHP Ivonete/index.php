<?php ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos - JP Autoreguladora</title>
    <style>
        *{
            text-align: center;
        }
        h2{
            background-color: slategray;
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
        a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>JP Autoreguladora</h2>
        <background-img src="img/mercedes.jpg">
    <form action="cadastro_produto.php" method="POST">
        <h1>Cadastro de Produto</h1>
        <label for="nome_produto">Nome do Produto:</label> <br>
        <input type="text" id="nome_produto" name="nome_produto" required><br>

        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao" rows="4" required></input><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="quantidade" name="quantidade" required><br>

        <label for="preco">Preço (R$):</label><br>
        <input type="text" id="preco" name="preco" required><br>

        <label for="categoria">Categoria:</label><br>
        <select id="categoria" name="categoria" required><br>
            <option value="">Selecione uma categoria</option>
            <option value="Peças">Peças</option>
            <option value="Ferramentas">Ferramentas</option>
            <option value="Lubrificantes">Lubrificantes</option>
            <option value="Acessórios">Acessórios</option>
        </select><br>

        <button type="submit">Cadastrar Produto</button> <br><br>
    <button><a href="index_cliente.php">Deseja Cadastrar cliente? <br> Clique Aqui!</a></button>
    </form>

</body>
</html>
<?php ?>