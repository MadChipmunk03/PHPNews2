<?php

namespace Model;

use PDO;

class Database{

    const HOST = 'madchipmunk03.cz';
    const PORT = '3306';
    const DBNAME = 'dbPHPNews';
    const USER = 'sssvt';
    const PASSWORD = '123456';

    private $conn = null;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DBNAME,
            self::USER,
            self::PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        $this->conn->query('SET NAMES utf8');
    }

    public function select($sql, $params = [])
    {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetchAll();
    }

    private function execute($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}