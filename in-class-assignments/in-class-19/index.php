<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=in_class_19",
        "root",
        "root"
    );
    
    $stmt = $pdo->query('SELECT * FROM posts');
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($posts);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 
