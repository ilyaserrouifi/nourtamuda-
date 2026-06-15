<?php
session_start();
require_once 'db_connect.php';

if (isset($_SESSION['admin_id'])) {
    sendResponse(true, [
        'admin_id' => $_SESSION['admin_id'],
        'username' => $_SESSION['admin_username'] ?? 'admin'
    ]);
} else {
    sendError('Non authentifié', 401);
}
?>
