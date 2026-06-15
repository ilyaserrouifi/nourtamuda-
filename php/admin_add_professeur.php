<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $nom = trim($data['nom'] ?? '');
    $photo = trim($data['photo'] ?? '');
    $matiere = trim($data['matiere'] ?? '');
    $experience = trim($data['experience'] ?? '');
    $bio = trim($data['bio'] ?? '');
    
    if (empty($nom)) {
        sendError('Le nom est requis');
    }
    
    $db = Database::getInstance()->getConnection();
    
    // Récupérer l'ID de la matière
    $matiereId = null;
    if (!empty($matiere)) {
        $stmt = $db->prepare("SELECT id FROM matieres WHERE nom ILIKE ? LIMIT 1");
        $stmt->execute(["%$matiere%"]);
        $matiereRow = $stmt->fetch();
        if ($matiereRow) $matiereId = $matiereRow['id'];
    }
    
    $stmt = $db->prepare("
        INSERT INTO professeurs (nom, photo, matiere_id, experience, bio, actif) 
        VALUES (?, ?, ?, ?, ?, true)
    ");
    $stmt->execute([$nom, $photo, $matiereId, $experience, $bio]);
    
    sendResponse(true, null, 'Professeur ajouté');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
