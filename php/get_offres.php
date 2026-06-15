<?php
require_once 'db_connect.php';

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        SELECT * FROM offres 
        WHERE actif = true 
        ORDER BY ordre_affichage
    ");
    $stmt->execute();
    
    $offres = $stmt->fetchAll();
    
    // Transformer matières en tableau
    foreach ($offres as &$offre) {
        $offre['matieres'] = explode(',', $offre['matieres']);
        if ($offre['avantages']) {
            $offre['avantages'] = explode(',', $offre['avantages']);
        }
    }
    
    sendResponse(true, $offres);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
