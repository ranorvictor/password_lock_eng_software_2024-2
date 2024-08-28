<?php
session_start();
require_once '../models/Operations.php';


if (!isset($_SESSION['usuario'])) {
    header("Location: /password_lock_eng_software/public/index.php");
    exit();
}


$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_SESSION['id_usuario']; 
    $plataforma = trim($_POST['plataforma']);
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $apelido = trim($_POST['apelido']);

    if (empty($plataforma) || empty($login) || empty($senha) || empty($apelido)) {
        $_SESSION['message'] = 'Por favor, preencha todos os campos.';
    } else {

        if ($db->adicionarSenha($idUsuario, $plataforma, $login, $senha, $apelido)) {
            $_SESSION['message'] = 'Senha cadastrada com sucesso!';
        } else {
            $_SESSION['message'] = 'Erro ao cadastrar a senha.';
        }
    }
    

    header("Location: cadastrarSenha.php");
    exit();
}
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
        .container .link-container {
            text-align: center;
        }
        .container p.success {
            color: green;
        }
        .container p.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Senha</h1>
        

        <div class="link-container">
            <a href="/password_lock_eng_software/public/index.php">Home</a>
        </div>


        <?php if (isset($_SESSION['message'])): ?>
            <p class="<?php echo strpos($_SESSION['message'], 'sucesso') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($_SESSION['message']); ?>
            </p>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

     
        <form action="" method="post">
            <label for="plataforma">Plataforma:</label>
            <input type="text" id="plataforma" name="plataforma" placeholder="Digite a plataforma na qual a senha vai ser salva" required>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" placeholder="Digite seu usuário" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a senha a ser salva" required>
            <label for="apelido">Apelido da conta:</label>
            <input type="text" id="apelido" name="apelido" placeholder="Digite um apelido da conta" required>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
