<?php

namespace App\Config;

use mysqli;

class Conexao
{
    function conectarBancoDeDados()
    {
        $dbhost = 'localhost';
        $dbUsername = 'password-lock';
        $dbPassword = '123123';
        $dbName = 'passwordlock';

        $conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }

        return $conexao;
    }
}