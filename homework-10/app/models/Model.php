<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model
{

    public function findAll() {
        $query = "select * from $this->table";
        return $this->fetchAll($query);
    }

    private function connect() {
        $dsn = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME . ";";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ];

        try {
            return new PDO($dsn, DBUSER, DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    public function fetch($query) {
        $connection = $this->connect();
        $stmt = $connection->query($query);
        return $stmt->fetch();
    }

    public function fetchAll($query) {
        $connection = $this->connect();
        $stmt = $connection->query($query);
        return $stmt->fetchAll();
    }

    public function fetchAllWithParams($query, $data = []) {
        $connection = $this->connect();
        $stmt = $connection->prepare($query);
        $success = $stmt->execute($data);

        if ($success) {
            $result = $stmt->fetchAll();
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function query($query, $data = []) {
        $connection = $this->connect();
        $stmt = $connection->prepare($query);
        $success = $stmt->execute($data);

        if ($success) {
            $result = $stmt->fetchAll();
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }
}
