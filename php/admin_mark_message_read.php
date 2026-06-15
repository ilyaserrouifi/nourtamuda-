<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'] ?? 0;
    
    if (!$id) {
        sendError('ID du message requis');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("UPDATE messages SET lu = true WHERE id = ?");
    $stmt->execute([$id]);
    
    sendResponse(true, null, 'Message marqué comme lu');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
