<?php
// Nenhum código PHP necessário aqui para estilizar a página
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin-bottom: 8px;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container input[type="submit"],
        .container input[type="reset"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .container input[type="submit"]:hover,
        .container input[type="reset"]:hover {
            background-color: #218838;
        }
        .container p {
            margin: 10px 0;
        }
        .container p.success {
            color: green;
        }
        .container p.error {
            color: red;
        }
        .container .link-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Senha</h1>
        
        <!-- Link para voltar para a página principal -->
        <div class="link-container">
            <a href="index.php">Home</a>
        </div>
        
        <!-- Formulário para cadastrar senha -->
        <form action="/cadastroSenha/" method="post">
            <label for="plataforma">Plataforma:</label>
            <input type="text" id="plataforma" name="Plataforma" placeholder="Digite a plataforma na qual a senha vai ser salva" required>
            <label for="login">Login:</label>
            <input type="text" id="login" name="Login" placeholder="Digite seu usuário" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="Senha" placeholder="Digite a senha a ser salva" required>
            <label for="apelido">Apelido da conta:</label>
            <input type="text" id="apelido" name="Apelido" placeholder="Digite um apelido da conta">
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
