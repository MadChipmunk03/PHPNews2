<?php

namespace Model;

use PDO;

class Database{

    //phpMyAdmin: madchipmunk03.cz/databazicka
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

    public function selectOne($sql, $params)
    {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($sql, $params = []) {
        $this->execute($sql, $params);
    }

    public function insert($sql, $params)
    {
        $this->execute($sql, $params);
    }

    public function update($sql, $params)
    {
        $this->execute($sql, $params);
    }

    private function execute($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}