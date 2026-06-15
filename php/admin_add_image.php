<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $url = trim($data['url'] ?? '');
    $titre = trim($data['titre'] ?? '');
    
    if (empty($url)) {
        sendError('URL de l\'image requise');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        INSERT INTO galerie (url, titre, actif) 
        VALUES (?, ?, true)
    ");
    $stmt->execute([$url, $titre]);
    
    sendResponse(true, null, 'Image ajoutée');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
