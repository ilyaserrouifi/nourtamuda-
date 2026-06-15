<?php
require_once 'db_connect.php';

try {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->query("
        SELECT eleves, professeurs, annees, taux_reussite, 
               inscriptions_annee, taux_satisfaction, villes_couvertes, heures_cours 
        FROM stats 
        ORDER BY id DESC 
        LIMIT 1
    ");
    $stats = $stmt->fetch();
    
    if (!$stats) {
        $stats = [
            'eleves' => 428,
            'professeurs' => 12,
            'annees' => 8,
            'taux_reussite' => 96,
            'inscriptions_annee' => 156,
            'taux_satisfaction' => 98,
            'villes_couvertes' => 5,
            'heures_cours' => 12500
        ];
    }
    
    sendResponse(true, $stats);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
