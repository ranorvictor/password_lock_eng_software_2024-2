<?php
include '../Config/config.php';
$plataforma = $_POST["plataforma"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$apelido = $_POST["apelido"];
$sql = "insert into passwordlock (id_usuario, plataforma, login, senha, apelido) values (1, '$plataforma', '$login', '$login', '$senha')";
$conn->query($sql);
$conn->close();
header("location: cadastrarSenha.php");