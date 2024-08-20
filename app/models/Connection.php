<?php

namespace app\models;

use PDO;

class Connection
{
  public static function connect()
  {
    $pdo = $_ENV['DB_CONNECTION'] . ":host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'] . ";charset=utf8";
    $conn = new PDO($pdo, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

    return $conn;
  }
}
