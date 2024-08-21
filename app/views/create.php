<?php

include("../Config/config.php");
use App\Config\Conexao;

$conn = new Conexao();
$conn = $conn->conectarBancoDeDados();
$plataforma = $_POST["plataforma"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$apelido = $_POST["apelido"];
$sql = "insert into senhas (plataforma, login, senha, apelido) values ('$plataforma', '$login', '$senha', '$apelido')";
$conn->query($sql);
$conn->close();
header("location: /app/views/cadastrarSenha.php");