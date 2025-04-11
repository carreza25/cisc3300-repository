<?php

namespace app\models;

class Item extends Model {

    public function getItems($type = null) {
        if ($type) {
            $query = "select * from items WHERE type like :type";
            return $this->fetchAllWithParams($query, ['type' => '%' . $type . '%']);
        }
        $query = "select * from items";
        return $this->fetchAll($query);
    }

    public function getItemById($id) {
        $query = "select * from items WHERE id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }

    public function saveItem($inputData){
        $query = "insert into items (name, type) values (:name, :type);";
        //[
        //                'firstName' => $userData['firstName'],
        //                'lastName' => $userData['lastName'],
        //                'email' => $userData['email'],
        //]
        return $this->query($query, $inputData);
    }

    public function updateItem($inputData){
        $query = "update items set name = :name, type = :type where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteItem($inputData){
        $query = "DELETE FROM items where id = :id";
        return $this->query($query, $inputData);
    }
}
?>