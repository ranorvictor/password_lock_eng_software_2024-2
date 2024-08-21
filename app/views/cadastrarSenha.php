<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Password Lock</title>
    </head>
    <body>
        <div id="FormularioCadastroSenha">
            <a href="index.php">Home</a>
        </div>
        <div>
            <form action="/cadastroSenha/" method="post">
                <label for="plataforma">Plataforma:</label>
                <input type="text" id="plataforma" name="Plataforma" placeholder="Digite a plataforma na qual a senha vai ser salva">
                <label for="login">Login</label>
                <input type="text" id="login" name="Login" placeholder="Digite seu usuário">
                <label for="Senha">Senha:</label>
                <input type="password" id="senha" name="Senha" placeholder="Digite a senha a ser salva">
                <label for="Apelido">Apelido da conta:</label>
                <input type="text" id="apelido" name="Apelido" placeholder="Digite um apelido da conta">
                <input type="reset" value="Limpar">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
