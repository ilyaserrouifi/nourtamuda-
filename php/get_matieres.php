<?php
require_once 'db_connect.php';

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        SELECT id, nom, icone, couleur, description, niveaux, objectifs 
        FROM matieres 
        WHERE actif = true 
        ORDER BY ordre_affichage
    ");
    $stmt->execute();
    
    $matieres = $stmt->fetchAll();
    
    // Transformer niveaux en tableau
    foreach ($matieres as &$matiere) {
        $matiere['niveaux'] = explode(',', $matiere['niveaux']);
    }
    
    sendResponse(true, $matieres);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
