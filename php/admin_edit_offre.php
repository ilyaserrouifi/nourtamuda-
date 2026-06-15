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
    $prix = trim($data['prix'] ?? '');
    $duree = trim($data['duree'] ?? '');
    $matieres = trim($data['matieres'] ?? '');
    $niveau = trim($data['niveau'] ?? '');
    $description = trim($data['description'] ?? '');
    
    if (!$id || empty($nom)) {
        sendError('Données invalides');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        UPDATE offres 
        SET nom = ?, prix = ?, duree = ?, matieres = ?, niveau = ?, description = ?, updated_at = CURRENT_TIMESTAMP 
        WHERE id = ?
    ");
    $stmt->execute([$nom, $prix, $duree, $matieres, $niveau, $description, $id]);
    
    sendResponse(true, null, 'Offre modifiée');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
