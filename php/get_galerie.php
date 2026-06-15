<?php
require_once 'db_connect.php';

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        SELECT id, url, titre, categorie 
        FROM galerie 
        WHERE actif = true 
        ORDER BY ordre_affichage, id DESC
    ");
    $stmt->execute();
    
    $galerie = $stmt->fetchAll();
    
    sendResponse(true, $galerie);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
