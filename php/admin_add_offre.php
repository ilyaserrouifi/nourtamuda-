<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $nom = trim($data['nom'] ?? '');
    $prix = trim($data['prix'] ?? '');
    $duree = trim($data['duree'] ?? '');
    $matieres = trim($data['matieres'] ?? '');
    $niveau = trim($data['niveau'] ?? '');
    $description = trim($data['description'] ?? '');
    
    if (empty($nom)) {
        sendError('Le nom est requis');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        INSERT INTO offres (nom, prix, duree, matieres, niveau, description, actif) 
        VALUES (?, ?, ?, ?, ?, ?, true)
    ");
    $stmt->execute([$nom, $prix, $duree, $matieres, $niveau, $description]);
    
    sendResponse(true, null, 'Offre ajoutée');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
