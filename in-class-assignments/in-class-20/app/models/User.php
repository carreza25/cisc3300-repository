<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class User extends Model {

    /*public function getAllUsersByNameOrEmail($title, $post) {
        $query = "select * from posts";
        return $this->query($query, [
            'title' => '%' . $title . '%',
            'post' => '%' . $post . '%',
        ]);
    }*/

    public function getAllUsers() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getUserById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveUser($inputData){
        $query = "insert into posts (title, post) values (:title, :post);";
        return $this->query($query, $inputData);
    }

    public function updateUser($inputData){
        $query = "update posts set title = :title, post = :post";
        return $this->query($query, $inputData);
    }

    public function deleteUser($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}