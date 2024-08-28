<?php
session_start();

require_once '../models/Operations.php';

$db = new Database();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    
    if (empty($usuario) || empty($senha)) {
        $error = 'Por favor, preencha todos os campos.';
    } else {
        if ($db->checarUsuario($usuario)) {
            $idUsuario = $db->retornarId($usuario);
            if ($idUsuario !== null) {
                
                if ($db->verificarSenha($usuario, $senha)) {
                    $_SESSION['usuario'] = $usuario; 
                    $_SESSION['id_usuario'] = $idUsuario; 
                    header("Location: ../../public/index.php");
                    exit();
                } else {
                    $error = 'Senha incorreta.';
                }
            } else {
                $error = 'Usuário não encontrado.';
            }
        } else {
            $error = 'Usuário não encontrado.';
        }
        
    }
    
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h1>Login</h1>
        
        <?php if ($message): ?>
            <p class="success"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>    
        <form method="post" action="">
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <div class="link-container">
            <a class="create-account" href="criarUsuario.php">Criar Conta</a>
        </div>
    </div>
</body>
</html>
