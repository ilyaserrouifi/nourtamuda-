<?php
session_start();
require_once 'db_connect.php';

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $username = trim($data['username'] ?? '');
    $password = trim($data['password'] ?? '');
    
    if (empty($username) || empty($password)) {
        sendError('Identifiants requis');
    }
    
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("SELECT id, username, password_hash FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        
        sendResponse(true, [
            'id' => $user['id'],
            'username' => $user['username']
        ], 'Connexion réussie');
    } else {
        sendError('Identifiants incorrects');
    }
    
} catch (PDOException $e) {
    sendError('Erreur: ' . $e->getMessage());
}
?>
