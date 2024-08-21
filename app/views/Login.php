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
                $senhas = $db->pesquisarSenhas($idUsuario);
                $senhaCorreta = false;
                foreach ($senhas as $storedSenha) {
                    if (trim($storedSenha['senha']) === $senha) {
                        $senhaCorreta = true;
                        break;
                    }
                }

                if ($senhaCorreta) {
                    $message = 'Login bem-sucedido!';
                    header("Location: cadastrarSenha.php");
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
