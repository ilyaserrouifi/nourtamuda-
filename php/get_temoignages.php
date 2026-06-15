<?php
require_once 'db_connect.php';

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        SELECT id, nom, niveau, note, texte, ville, date 
        FROM temoignages 
        WHERE actif = true 
        ORDER BY id DESC 
        LIMIT 10
    ");
    $stmt->execute();
    
    $temoignages = $stmt->fetchAll();
    
    sendResponse(true, $temoignages);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
