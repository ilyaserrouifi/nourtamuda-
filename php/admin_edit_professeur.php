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
    $photo = trim($data['photo'] ?? '');
    $matiere = trim($data['matiere'] ?? '');
    $experience = trim($data['experience'] ?? '');
    $bio = trim($data['bio'] ?? '');
    
    if (!$id || empty($nom)) {
        sendError('Données invalides');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $matiereId = null;
    if (!empty($matiere)) {
        $stmt = $db->prepare("SELECT id FROM matieres WHERE nom ILIKE ? LIMIT 1");
        $stmt->execute(["%$matiere%"]);
        $matiereRow = $stmt->fetch();
        if ($matiereRow) $matiereId = $matiereRow['id'];
    }
    
    $stmt = $db->prepare("
        UPDATE professeurs 
        SET nom = ?, photo = ?, matiere_id = ?, experience = ?, bio = ?, updated_at = CURRENT_TIMESTAMP 
        WHERE id = ?
    ");
    $stmt->execute([$nom, $photo, $matiereId, $experience, $bio, $id]);
    
    sendResponse(true, null, 'Professeur modifié');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
