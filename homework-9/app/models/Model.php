<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {

    public function findAll() {
        $query = "select * from $this->table";
        return $this->fetchAll($query);
    }

    private function connect() {
//      dsn: data source name
//      some of these are optional
        $dsn = "mysql:hostname=" . DBHOST .";dbname=" . DBNAME . ";";

        //$dsn mysql:hostname=localhost;dbname=items

        $options = [
            //we can set the error mode, to throw exceptions or PDO type errors
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //set the default fetch type to associative array
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        //['name'=>'pinecone'], ['name'=>'nathan']

        try {
            return new PDO($dsn, DBUSER, DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }

    }

    public function fetch($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        //no params, one row
        return $statementObject->fetch();
    }

    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        //no params, multiple rows
        return $statementObject->fetchAll();
    }

    //this one uses prepared statements!
    public function fetchAllWithParams($query, $data = []) {
        $connection = $this->connect();
        //prepare statement - a query with any dynamic data subbed out with variables like :firstName
        $statementObject = $connection->prepare($query);
        //data is an associative array with key value pairs matching any params in the query
        $successOrFail = $statementObject->execute($data);
        if ($successOrFail) {
            $result = $statementObject->fetchAll();
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}