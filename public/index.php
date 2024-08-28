<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
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
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container a {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .container a:hover {
            background-color: #0056b3;
        }
        .container .logout {
            background-color: #dc3545;
        }
        .container .logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Menu Principal</h1>

        <?php if (isset($_SESSION['usuario'])): ?>
            <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8'); ?>!</p>
            <a href="/password_lock_eng_software/app/views/cadastrarSenha.php">Cadastrar Senha</a>
            <a href="/password_lock_eng_software/app/views/visualizarSenha.php">Visualizar Senhas</a>
            <a href="/password_lock_eng_software/app/views/login.php" class="logout">Logout</a>
        <?php else: ?>
            <p>Bem-vindo ao Password Lock. Por favor, faça login para continuar.</p>
            <a href="/password_lock_eng_software/app/views/login.php">Login</a>
            <a href="/password_lock_eng_software/app/views/criarUsuario.php">Criar Conta</a>
        <?php endif; ?>
    </div>
</body>
</html>
