<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $id = $data['id'] ?? 0;
    $nom = trim($data['nom'] ?? '');
    $icone = trim($data['icone'] ?? '📚');
    $niveaux = trim($data['niveaux'] ?? '');
    $description = trim($data['description'] ?? '');
    
    if (!$id || empty($nom)) {
        sendError('Données invalides');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        UPDATE matieres 
        SET nom = ?, icone = ?, niveaux = ?, description = ?, updated_at = CURRENT_TIMESTAMP 
        WHERE id = ?
    ");
    $stmt->execute([$nom, $icone, $niveaux, $description, $id]);
    
    sendResponse(true, null, 'Matière modifiée');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
