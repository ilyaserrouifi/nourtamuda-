<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        SELECT id, nom, email, telephone, message, lu, date 
        FROM messages 
        ORDER BY date DESC
    ");
    $stmt->execute();
    $messages = $stmt->fetchAll();
    
    sendResponse(true, $messages);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
