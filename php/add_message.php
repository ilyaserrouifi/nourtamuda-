<?php
require_once 'db_connect.php';

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!$data) {
        sendError('Données invalides');
    }
    
    $nom = trim($data['nom'] ?? '');
    $email = trim($data['email'] ?? '');
    $telephone = trim($data['telephone'] ?? '');
    $message = trim($data['message'] ?? '');
    
    if (empty($nom) || empty($email) || empty($message)) {
        sendError('Veuillez remplir tous les champs obligatoires');
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendError('Email invalide');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        INSERT INTO messages (nom, email, telephone, message, lu, date) 
        VALUES (?, ?, ?, ?, false, NOW())
    ");
    $stmt->execute([$nom, $email, $telephone, $message]);
    
    sendResponse(true, null, 'Message envoyé avec succès');
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
