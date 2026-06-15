<?php
require_once 'config.php';

class Database {
    private $connection;
    private static $instance = null;
    
    private function __construct() {
        try {
            $dsn = "pgsql:host=" . DB_HOST . 
                   ";port=" . DB_PORT . 
                   ";dbname=" . DB_NAME . 
                   ";sslmode=" . DB_SSLMODE;
            
            $this->connection = new PDO($dsn, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            
            $this->initDatabase();
            
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'error' => 'Erreur de connexion: ' . $e->getMessage()
            ]));
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    private function initDatabase() {
        $tables = ['matieres', 'professeurs', 'offres', 'galerie', 'temoignages', 'messages', 'newsletter', 'stats', 'admin_users'];
        
        $tableExists = true;
        foreach ($tables as $table) {
            $stmt = $this->connection->prepare("SELECT to_regclass('public." . $table . "')");
            $stmt->execute();
            if (!$stmt->fetchColumn()) {
                $tableExists = false;
                break;
            }
        }
        
        if (!$tableExists) {
            $this->createTables();
        }
    }
    
    private function createTables() {
        try {
            // Table matieres
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS matieres (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(100) NOT NULL,
                    icone VARCHAR(10) DEFAULT '📚',
                    couleur VARCHAR(20) DEFAULT '#1B3A6B',
                    description TEXT,
                    niveaux TEXT,
                    objectifs TEXT,
                    ordre_affichage INT DEFAULT 0,
                    actif BOOLEAN DEFAULT TRUE,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table professeurs
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS professeurs (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(150) NOT NULL,
                    photo VARCHAR(500),
                    matiere_id INT REFERENCES matieres(id) ON DELETE SET NULL,
                    experience VARCHAR(50),
                    bio TEXT,
                    diplome VARCHAR(200),
                    telephone VARCHAR(20),
                    email VARCHAR(100),
                    actif BOOLEAN DEFAULT TRUE,
                    ordre_affichage INT DEFAULT 0,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table offres
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS offres (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(150) NOT NULL,
                    prix VARCHAR(50) NOT NULL,
                    duree VARCHAR(50),
                    matieres TEXT,
                    niveau VARCHAR(50),
                    description TEXT,
                    popularite INT DEFAULT 0,
                    avantages TEXT,
                    actif BOOLEAN DEFAULT TRUE,
                    ordre_affichage INT DEFAULT 0,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table galerie
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS galerie (
                    id SERIAL PRIMARY KEY,
                    url VARCHAR(500) NOT NULL,
                    titre VARCHAR(200),
                    categorie VARCHAR(100),
                    actif BOOLEAN DEFAULT TRUE,
                    ordre_affichage INT DEFAULT 0,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table temoignages
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS temoignages (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(150) NOT NULL,
                    niveau VARCHAR(100),
                    note INT CHECK (note >= 1 AND note <= 5),
                    texte TEXT NOT NULL,
                    ville VARCHAR(100),
                    date DATE DEFAULT CURRENT_DATE,
                    actif BOOLEAN DEFAULT TRUE,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table messages
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS messages (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(150) NOT NULL,
                    email VARCHAR(200) NOT NULL,
                    telephone VARCHAR(20),
                    message TEXT NOT NULL,
                    lu BOOLEAN DEFAULT FALSE,
                    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table newsletter
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS newsletter (
                    id SERIAL PRIMARY KEY,
                    email VARCHAR(200) UNIQUE NOT NULL,
                    actif BOOLEAN DEFAULT TRUE,
                    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table stats
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS stats (
                    id SERIAL PRIMARY KEY,
                    eleves INT DEFAULT 428,
                    professeurs INT DEFAULT 12,
                    annees INT DEFAULT 8,
                    taux_reussite INT DEFAULT 96,
                    inscriptions_annee INT DEFAULT 156,
                    taux_satisfaction INT DEFAULT 98,
                    villes_couvertes INT DEFAULT 5,
                    heures_cours INT DEFAULT 12500,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            // Table admin_users
            $this->connection->exec("
                CREATE TABLE IF NOT EXISTS admin_users (
                    id SERIAL PRIMARY KEY,
                    username VARCHAR(100) UNIQUE NOT NULL,
                    password_hash VARCHAR(255) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            $this->insertDefaultData();
            
        } catch (PDOException $e) {
            error_log("Erreur création tables: " . $e->getMessage());
        }
    }
    
    private function insertDefaultData() {
        // Vérifier si les matières existent
        $stmt = $this->connection->query("SELECT COUNT(*) FROM matieres");
        $count = $stmt->fetchColumn();
        
        if ($count == 0) {
            $matieres = [
                ['Mathématiques', '📐', '#1B3A6B', 'Algèbre, géométrie, analyse, probabilités', 'Primaire,Collège,Lycée', 'Maîtriser les concepts fondamentaux', 1],
                ['Physique-Chimie', '⚛️', '#2E7D32', 'Mécanique, électricité, chimie', 'Collège,Lycée', 'Comprendre les lois physiques', 2],
                ['SVT', '🔬', '#4CAF50', 'Biologie, géologie, écologie', 'Collège,Lycée', 'Maîtriser la biologie', 3],
                ['Français', '📖', '#9C27B0', 'Grammaire, conjugaison, expression', 'Primaire,Collège,Lycée', 'Améliorer l\'expression écrite', 4],
                ['Arabe', '📜', '#FF9800', 'Langue et littérature arabes', 'Primaire,Collège,Lycée', 'Maîtriser la grammaire arabe', 5],
                ['Anglais', '🇬🇧', '#F44336', 'Grammaire, vocabulaire, conversation', 'Primaire,Collège,Lycée', 'Atteindre niveau B2/C1', 6],
                ['Histoire-Géographie', '🗺️', '#795548', 'Histoire du Maroc, géographie mondiale', 'Collège,Lycée', 'Comprendre l\'histoire marocaine', 7],
                ['Informatique', '💻', '#607D8B', 'Algorithmique, programmation', 'Primaire,Collège,Lycée', 'Apprendre à coder', 8],
                ['Philosophie', '🧠', '#673AB7', 'Préparation au BAC philo', 'Lycée', 'Maîtriser la méthode de dissertation', 9]
            ];
            
            $insertStmt = $this->connection->prepare("
                INSERT INTO matieres (nom, icone, couleur, description, niveaux, objectifs, ordre_affichage) 
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            
            foreach ($matieres as $m) {
                $insertStmt->execute($m);
            }
            
            // Insertion admin par défaut (mot de passe: nour_tamuda_2025)
            $passwordHash = password_hash('nourtamuda2025', PASSWORD_DEFAULT);
            $stmt = $this->connection->prepare("INSERT INTO admin_users (username, password_hash) VALUES ('admin', ?) ON CONFLICT (username) DO NOTHING");
            $stmt->execute([$passwordHash]);
            
            // Insertion stats par défaut
            $this->connection->exec("
                INSERT INTO stats (eleves, professeurs, annees, taux_reussite, inscriptions_annee, taux_satisfaction, villes_couvertes, heures_cours) 
                VALUES (428, 12, 8, 96, 156, 98, 5, 12500)
            ");
        }
    }
}

function sendResponse($success, $data = null, $message = null) {
    $response = ['success' => $success];
    if ($data !== null) $response['data'] = $data;
    if ($message !== null) $response['message'] = $message;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

function sendError($message, $code = 400) {
    http_response_code($code);
    sendResponse(false, null, $message);
}
?>
