<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $nom = trim($data['nom'] ?? '');
    $niveau = trim($data['niveau'] ?? '');
    $note = intval($data['note'] ?? 5);
    $texte = trim($data['texte'] ?? '');
    
    if (empty($nom) || empty($texte)) {
        sendError('Nom et témoignage requis');
    }
    
    if ($note < 1 || $note > 5) {
        $note = 5;
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        INSERT INTO temoignages (nom, niveau, note, texte, actif) 
        VALUES (?, ?, ?, ?, true)
    ");
    $stmt->execute([$nom, $niveau, $note, $texte]);
    
    sendResponse(true, null, 'Témoignage ajouté');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
