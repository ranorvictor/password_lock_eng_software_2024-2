<?php
session_start();

require_once '../models/Operations.php';
$db = new Database();
$message = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    if (empty($usuario) || empty($senha)) {
        $error = 'Por favor, preencha todos os campos.';
    } else {
        $resultado = $db->criarUsuario($usuario, $senha);
        if ($resultado === 1) {
            $error = 'Erro: Usuário já existe.';
        } elseif ($resultado === 2) {
            $error = 'Erro: Problema na preparação da consulta.';
        } elseif ($resultado === 3) {
            $error = 'Erro: Problema ao executar a consulta.';
        } elseif ($resultado === 4) {
            $_SESSION['message'] = 'Usuário criado com sucesso.';
            header("Location: login.php");
            exit();
        } else {
            $error = 'Erro desconhecido.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <h1>Criar Novo Usuário</h1>
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
            <input type="submit" value="Criar Usuário">
        </form>
        <div class="link-container">
            <a href="index.php">Voltar para Login</a>
        </div>
    </div>
</body>
</html>
