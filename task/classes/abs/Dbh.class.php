<?php

namespace classes\abs;

use PDO;

abstract class Dbh
{
    private $host = "localhost";
    private $user = "id18670194_david";
    private $pwd = "sPC&~%NG3@z\*A_W";
    private $dbName = "id18670194_scandi_task";

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}