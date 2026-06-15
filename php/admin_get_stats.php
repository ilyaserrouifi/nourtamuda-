<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin_id'])) {
    sendError('Non autorisé', 401);
}

try {
    $db = Database::getInstance()->getConnection();
    
    // Nombre de matières
    $stmt = $db->query("SELECT COUNT(*) as count FROM matieres WHERE actif = true");
    $matieresCount = $stmt->fetch()['count'];
    
    // Nombre de professeurs
    $stmt = $db->query("SELECT COUNT(*) as count FROM professeurs WHERE actif = true");
    $professeursCount = $stmt->fetch()['count'];
    
    // Nombre d'offres
    $stmt = $db->query("SELECT COUNT(*) as count FROM offres WHERE actif = true");
    $offresCount = $stmt->fetch()['count'];
    
    // Messages non lus
    $stmt = $db->query("SELECT COUNT(*) as count FROM messages WHERE lu = false");
    $messagesNonLus = $stmt->fetch()['count'];
    
    // Derniers messages
    $stmt = $db->prepare("
        SELECT id, nom, email, telephone, message, lu, date 
        FROM messages 
        ORDER BY date DESC 
        LIMIT 10
    ");
    $stmt->execute();
    $derniersMessages = $stmt->fetchAll();
    
    sendResponse(true, [
        'matieres' => $matieresCount,
        'professeurs' => $professeursCount,
        'offres' => $offresCount,
        'messages_non_lus' => $messagesNonLus,
        'derniers_messages' => $derniersMessages
    ]);
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
