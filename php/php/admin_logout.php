<?php
session_start();
session_destroy();
sendResponse(true, null, 'Déconnexion réussie');
?>
