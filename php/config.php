<?php
// ============================================================
// CONFIGURATION DE LA BASE DE DONNÉES POSTGRESQL (NEON)
// ============================================================

// Chaîne de connexion PostgreSQL
define('DB_HOST', 'ep-cool-breeze-ahnoc951-pooler.c-3.us-east-1.aws.neon.tech');
define('DB_PORT', '5432');
define('DB_NAME', 'neondb');
define('DB_USER', 'neondb_owner');
define('DB_PASSWORD', 'npg_5qfwlYLXOg7J');

// Options de connexion
define('DB_SSLMODE', 'require');

// Configuration des paramètres
date_default_timezone_set('Africa/Casablanca');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Activer les erreurs pour le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
