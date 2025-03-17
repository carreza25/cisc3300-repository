<?php
class NoteController {
    public function showForm() {
        include 'views/note.html';
    }

    public function handleRequest() {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Error']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');
        
        if (strlen($title) <= 3) {
            echo json_encode(['error' => 'Title must be at least 3 characters long!']);
            return;
        }
        
        if (strlen($description) <= 10) {
            echo json_encode(['error' => 'Description must be at least 10 characters long!']);
            return;
        }

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        
        echo json_encode(['message' => 'Success!']);
    }
}
?> 