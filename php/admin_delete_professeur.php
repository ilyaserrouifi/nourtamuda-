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
        sendError('ID requis');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("UPDATE professeurs SET actif = false WHERE id = ?");
    $stmt->execute([$id]);
    
    sendResponse(true, null, 'Professeur supprimé');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
