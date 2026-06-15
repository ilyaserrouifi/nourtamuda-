<?php
require_once 'db_connect.php';

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        SELECT p.*, m.nom as matiere_nom, m.icone as matiere_icone
        FROM professeurs p
        LEFT JOIN matieres m ON p.matiere_id = m.id
        WHERE p.actif = true
        ORDER BY p.ordre_affichage
    ");
    $stmt->execute();
    
    $professeurs = $stmt->fetchAll();
    
    sendResponse(true, $professeurs);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
