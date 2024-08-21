<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Password Lock</title>
    </head>
    <body>
        <div id="FormularioCadastroSenha">
            <a href="/public/index.php">Home</a>
        </div>
        <div>
            <form action="create.php" method="post">
                <label for="plataforma">Plataforma:</label>
                <input type="text" id="plataforma" name="plataforma" placeholder="Digite a plataforma na qual a senha vai ser salva">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" placeholder="Digite seu usuário">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite a senha a ser salva">
                <label for="apelido">Apelido da conta:</label>
                <input type="text" id="apelido" name="apelido" placeholder="Digite um apelido da conta">
                <input type="reset" value="Limpar">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
