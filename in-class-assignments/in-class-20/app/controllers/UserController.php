<?php

namespace app\controllers;

use app\models\User;

class UserController
{
    public function validateUser($inputData) {
        $errors = [];
        $title = $inputData['title'];
        $post = $inputData['post'];

        if ($title) {
            $title = htmlspecialchars($title, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($title) < 2) {
                $errors['titleShort'] = 'title is too short';
            }
        } else {
            $errors['requiredTitle'] = 'title is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'title' => $title,
            'post' => $post,
        ];
    }

    public function getAllUsers() {
        $userModel = new User();
        header("Content-Type: application/json");
        $users = $userModel->getAllUsers();

        echo json_encode($users);
        exit();
    }

    public function getUserByID($id) {
        $userModel = new User();
        header("Content-Type: application/json");
        $user = $userModel->getUserById($id);
        echo json_encode($user);
        exit();
    }

    public function saveUser() {
        $inputData = [
            'title' => $_POST['title'] ?? null,
            'post' => $_POST['post'] ?? null,
        ];
        $userData = $this->validateUser($inputData);

        $user = new User();
        $user->saveUser(
            [
                'title' => $userData['title'],
                'post' => $userData['post'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateUser($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'title' => $_PUT['title'] ?: null,
            'post' => $_PUT['post'] ?: null,
        ];
        $userData = $this->validateUser($inputData);
        //we could save the data off to be saved here

        $user = new User();
        $user->updateUser(
            [
                'id' => $id,
                'title' => $userData['title'],
                'post' => $userData['post'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteUser($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $user = new User();
        $user->deleteUser(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function usersView() {
        include '../public/assets/views/user/users-view.html';
        exit();
    }

    public function usersAddView() {
        include '../public/assets/views/user/users-add.html';
        exit();
    }

    public function usersDeleteView() {
        include '../public/assets/views/user/users-delete.html';
        exit();
    }

    public function usersUpdateView() {
        include '../public/assets/views/user/users-update.html';
        exit();
    }


}
