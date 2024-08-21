<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "passwordlock";
    protected $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            die("Conexão falhou: " . $this->connection->connect_error);
        }
    }

    public function criarUsuario($usuario, $senha)
    {
        if ($this->checarUsuario($usuario)) {
            return 1;
        } else {
            $sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
            $stmt = $this->connection->prepare($sql);
    
            if (!$stmt) {
                return 2;
            }
            $stmt->bind_param("ss", $usuario, $senha);
    
            if (!$stmt->execute()) {
                return 3;
            }
    
            $stmt->close();
            echo "Usuário criado com sucesso.";
            return 4;
        }
    }
    

    public function adicionarSenha($idUsuario, $plataforma, $login, $senha, $apelido)
    {
        $sql = "INSERT INTO senhas (id_usuario, plataforma, login, senha, apelido) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("issss", $idUsuario, $plataforma, $login, $senha, $apelido);
        return $stmt->execute();
    }

    public function deletarSenha($idSenha)
    {
        $sql = "DELETE FROM senhas WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $idSenha);
        return $stmt->execute();
    }

    public function pesquisarSenhas($idUsuario)
    {
        $sql = "SELECT senha FROM usuarios WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function checarUsuario($usuario)
    {
        $sql = "SELECT COUNT(*) as count FROM usuarios WHERE usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['count'] > 0;
    }

    public function retornarId($usuario)
    {
        $sql = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return isset($result['id']) ? $result['id'] : null;
    }
}

?>
