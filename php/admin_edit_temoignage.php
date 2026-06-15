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
    $niveau = trim($data['niveau'] ?? '');
    $note = intval($data['note'] ?? 5);
    $texte = trim($data['texte'] ?? '');
    
    if (!$id || empty($nom)) {
        sendError('Données invalides');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        UPDATE temoignages 
        SET nom = ?, niveau = ?, note = ?, texte = ? 
        WHERE id = ?
    ");
    $stmt->execute([$nom, $niveau, $note, $texte, $id]);
    
    sendResponse(true, null, 'Témoignage modifié');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
