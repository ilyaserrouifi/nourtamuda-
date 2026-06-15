<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $nom = trim($data['nom'] ?? '');
    $icone = trim($data['icone'] ?? '📚');
    $niveaux = trim($data['niveaux'] ?? 'Primaire,Collège,Lycée');
    $description = trim($data['description'] ?? '');
    
    if (empty($nom)) {
        sendError('Le nom de la matière est requis');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->query("SELECT COALESCE(MAX(ordre_affichage), 0) + 1 as next_order FROM matieres");
    $nextOrder = $stmt->fetch()['next_order'];
    
    $stmt = $db->prepare("
        INSERT INTO matieres (nom, icone, niveaux, description, ordre_affichage, actif) 
        VALUES (?, ?, ?, ?, ?, true)
    ");
    $stmt->execute([$nom, $icone, $niveaux, $description, $nextOrder]);
    
    sendResponse(true, null, 'Matière ajoutée avec succès');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
