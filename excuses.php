<?php
require_once 'excuses-config.php';

try {
    $stmt = $pdo->query('SELECT * FROM excuses ORDER BY RAND()');
    $excuses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($excuses);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>