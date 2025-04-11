<?php

namespace app\controllers;

use app\models\Item;

class ItemController
{
    public function getItems() {
        $itemModel = new Item();
        $query = !empty($_GET['type']) ? $_GET['type'] : null;
        $items = $itemModel->getItems($query);
        echo json_encode($items);
        exit();
    }

    public function getItemByID($id) {
        $itemModel = new Item();
        $item = $itemModel->getItemById($id);
        echo json_encode($item);
        exit();
    }

    public function itemsView() {
        include '../public/assets/views/item/items.html';
        exit();
    }

    public function itemDetailsView() {
        include '../public/assets/views/item/itemDetails.html';
        exit();
    }

    public function validateItem($inputData) {
        $errors = [];
        $name = $inputData['name'] ?? null;
        $type = $inputData['type'] ?? null;

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'Name is too short.';
            }
        } else {
            $errors['requiredName'] = 'Name is required.';
        }

        if ($type) {
            $type = htmlspecialchars($type, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($type) < 2) {
                $errors['typeShort'] = 'Type is too short.';
            }
        } else {
            $errors['requiredType'] = 'Type is required.';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'name' => $name,
            'type' => $type
        ];
    }

    public function saveItem() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'type' => $_POST['type'] ?: null,
        ];

        $itemData = $this->validateItem($inputData);

        $item = new Item();
        $item->saveItem(
            [
                'name' => $itemData['name'],
                'type' => $itemData['type'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateItem($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);
    
        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'type' => $_PUT['type'] ?: null,
        ];
        $itemData = $this->validateItem($inputData);
    
        $item = new Item();
        $item->updateItem([
            'id' => $id,
            'name' => $itemData['name'],
            'type' => $itemData['type'],
        ]);
    
        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }
    
    
    public function deleteItem($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $item = new Item();
        $item->deleteItem(
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

    public function itemsAddView() {
        include '../public/assets/views/item/item-add.html';
        exit();
    }

    public function itemsDeleteView() {
        include '../public/assets/views/item/item-delete.html';
        exit();
    }
}
?>
