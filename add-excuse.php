<?php
require_once 'excuses-config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($data['http_code']) || !isset($data['tag']) || !isset($data['message'])) {
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }
    
    try {
        $stmt = $pdo->prepare('INSERT INTO excuses (http_code, tag, message) VALUES (?, ?, ?)');
        $stmt->execute([$data['http_code'], $data['tag'], $data['message']]);
        
        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Method not allowed']);
}
?>