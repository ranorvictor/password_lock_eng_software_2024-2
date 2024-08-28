<?php

require_once '../models/Operations.php';
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: /password_lock_eng_software/public/index.php");
    exit();
}

$db = new Database();

$idUsuario = $db->retornarId($_SESSION['usuario']);


$senhas = $db->pesquisarSenhas($idUsuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Senhas</title>
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
            margin-bottom: 20px;
            text-align: center;
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
        .container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .container table, .container th, .container td {
            border: 1px solid #ccc;
        }
        .container th, .container td {
            padding: 10px;
            text-align: left;
        }
        .container th {
            background-color: #f2f2f2;
        }
        .link-container {
            text-align: center;
            margin-top: 20px;
        }
        .link-container a {
            text-decoration: none;
            color: #007bff;
        }
        .link-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Visualizar Senhas</h1>


        <a href="/password_lock_eng_software/public/index.php">Home</a>
        <a href="/password_lock_eng_software/app/views/cadastrarSenha.php">Cadastrar Senha</a>


        <table>
            <thead>
                <tr>
                    <th>Plataforma</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Apelido</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($senhas)): ?>
                    <?php foreach ($senhas as $senha): ?>
                        <tr>
                            <td><?php echo isset($senha['plataforma']) ? htmlspecialchars($senha['plataforma'], ENT_QUOTES, 'UTF-8') : 'N/A'; ?></td>
                            <td><?php echo isset($senha['login']) ? htmlspecialchars($senha['login'], ENT_QUOTES, 'UTF-8') : 'N/A'; ?></td>
                            <td><?php echo isset($senha['senha']) ? htmlspecialchars($senha['senha'], ENT_QUOTES, 'UTF-8') : 'N/A'; ?></td>
                            <td><?php echo isset($senha['apelido']) ? htmlspecialchars($senha['apelido'], ENT_QUOTES, 'UTF-8') : 'N/A'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhuma senha salva encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


        <div class="link-container">
            <a href="/password_lock_eng_software/public/index.php">Home</a>
        </div>
    </div>
</body>
</html>
