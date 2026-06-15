// ============================================================
// NOURTAMUDA - BASE DE DONNÉES COMPLÈTE
// Version: 2.0
// ============================================================

// ============================================================
// STRUCTURE COMPLÈTE DES DONNÉES PAR DÉFAUT
// ============================================================

const NOURTAMUDA_DB_VERSION = "2.0.0";
const NOURTAMUDA_DB_KEYS = {
    MATIERES: "nourtamuda_matieres",
    PROFESSEURS: "nourtamuda_professeurs",
    OFFRES: "nourtamuda_offres",
    GALERIE: "nourtamuda_galerie",
    TEMOIGNAGES: "nourtamuda_temoignages",
    MESSAGES: "nourtamuda_messages",
    STATS: "nourtamuda_stats",
    PARAMETRES: "nourtamuda_parametres",
    NEWSLETTER: "nourtamuda_newsletter",
    EVENEMENTS: "nourtamuda_evenements"
};

// Données par défaut - COMPLÈTES ET DÉTAILLÉES
const DEFAULT_MATIERES = [
    { id: 1, nom: "Mathématiques", niveau: ["Primaire", "Collège", "Lycée"], icone: "📐", couleur: "#1B3A6B", description: "Algèbre, géométrie, analyse, probabilités et statistiques. Préparation aux examens nationaux.", objectifs: ["Maîtriser les concepts fondamentaux", "Développer le raisonnement logique", "Préparation intensive BAC"] },
    { id: 2, nom: "Physique-Chimie", niveau: ["Collège", "Lycée"], icone: "⚛️", couleur: "#2E7D32", description: "Mécanique, électricité, chimie organique et inorganique. Travaux pratiques inclus.", objectifs: ["Comprendre les lois physiques", "Maîtriser les équations chimiques", "TP en laboratoire"] },
    { id: 3, nom: "SVT", niveau: ["Collège", "Lycée"], icone: "🔬", couleur: "#4CAF50", description: "Biologie, géologie, écologie. Préparation spéciale BAC scientifique.", objectifs: ["Maîtriser la biologie cellulaire", "Comprendre la géologie", "Préparation aux épreuves pratiques"] },
    { id: 4, nom: "Français", niveau: ["Primaire", "Collège", "Lycée"], icone: "📖", couleur: "#9C27B0", description: "Grammaire, conjugaison, expression écrite et orale. Méthodologie de la dissertation.", objectifs: ["Améliorer l'expression écrite", "Maîtriser les règles grammaticales", "Préparation au BAC français"] },
    { id: 5, nom: "Arabe", niveau: ["Primaire", "Collège", "Lycée"], icone: "📜", couleur: "#FF9800", description: "Langue et littérature arabes, grammaire approfondie, dictée et expression.", objectifs: ["Maîtriser la grammaire arabe", "Améliorer la dictée", "Étude des textes littéraires"] },
    { id: 6, nom: "Anglais", niveau: ["Primaire", "Collège", "Lycée"], icone: "🇬🇧", couleur: "#F44336", description: "Grammaire, vocabulaire, conversation. Préparation TOEIC/IELTS.", objectifs: ["Atteindre niveau B2/C1", "Maîtriser la conversation", "Préparation certifications"] },
    { id: 7, nom: "Histoire-Géo", niveau: ["Collège", "Lycée"], icone: "🗺️", couleur: "#795548", description: "Histoire du Maroc, géographie mondiale, éducation civique et géopolitique.", objectifs: ["Comprendre l'histoire marocaine", "Maîtriser la géographie", "Préparation aux examens"] },
    { id: 8, nom: "Informatique", niveau: ["Primaire", "Collège", "Lycée"], icone: "💻", couleur: "#607D8B", description: "Algorithmique, programmation Python/JavaScript, bureautique avancée.", objectifs: ["Apprendre à coder", "Maîtriser les outils bureautiques", "Préparation aux concours"] },
    { id: 9, nom: "Philosophie", niveau: ["Lycée"], icone: "🧠", couleur: "#673AB7", description: "Préparation au BAC philo, dissertation, explication de texte et concepts clés.", objectifs: ["Maîtriser la méthode de dissertation", "Comprendre les grands philosophes", "Réussir le BAC philo"] },
    { id: 10, nom: "Espagnol", niveau: ["Collège", "Lycée"], icone: "🇪🇸", couleur: "#FF5722", description: "Langue espagnole, culture hispanique, préparation aux examens.", objectifs: ["Atteindre niveau B1", "Maîtriser la conversation", "Culture hispanique"] }
];

const DEFAULT_PROFESSEURS = [
    { id: 1, nom: "Prof. Karim El Fassi", photo: "https://randomuser.me/api/portraits/men/32.jpg", matiere: "Mathématiques", experience: "12 ans", bio: "Agrégé de mathématiques, spécialiste de la préparation au baccalauréat. Auteur de plusieurs ouvrages pédagogiques.", diplome: "Doctorat en Mathématiques", telephone: "0612345601", email: "karim.elfassi@nourtamuda.ma" },
    { id: 2, nom: "Prof. Salima Benjelloun", photo: "https://randomuser.me/api/portraits/women/68.jpg", matiere: "Physique-Chimie", experience: "9 ans", bio: "Doctorante en physique, méthode interactive et expériences en laboratoire. Passionnée par la vulgarisation scientifique.", diplome: "Master en Physique", telephone: "0612345602", email: "salima.benjelloun@nourtamuda.ma" },
    { id: 3, nom: "Prof. Youssef El Mansouri", photo: "https://randomuser.me/api/portraits/men/45.jpg", matiere: "Français", experience: "15 ans", bio: "Ancien examinateur, expert en préparation aux examens nationaux. Spécialiste de la méthodologie de la dissertation.", diplome: "Master en Lettres Modernes", telephone: "0612345603", email: "youssef.elmamsouri@nourtamuda.ma" },
    { id: 4, nom: "Prof. Fatima Zahra", photo: "https://randomuser.me/api/portraits/women/44.jpg", matiere: "Arabe", experience: "10 ans", bio: "Spécialiste en littérature arabe et grammaire approfondie. Auteure de plusieurs articles sur la linguistique arabe.", diplome: "Doctorat en Langue Arabe", telephone: "0612345604", email: "fatima.zahra@nourtamuda.ma" },
    { id: 5, nom: "Prof. Mehdi Alaoui", photo: "https://randomuser.me/api/portraits/men/52.jpg", matiere: "Anglais", experience: "8 ans", bio: "Certifié IELTS et TOEIC, cours conversation et grammaire. Séjours linguistiques aux États-Unis et au Royaume-Uni.", diplome: "Master en Linguistique Anglaise", telephone: "0612345605", email: "mehdi.alaoui@nourtamuda.ma" },
    { id: 6, nom: "Prof. Noura Tazi", photo: "https://randomuser.me/api/portraits/women/22.jpg", matiere: "SVT", experience: "7 ans", bio: "Passionnée de biologie, préparation renforcée pour le bac. Encadrement de projets scientifiques.", diplome: "Doctorat en Biologie", telephone: "0612345606", email: "noura.tazi@nourtamuda.ma" },
    { id: 7, nom: "Prof. Hassan El Ouazzani", photo: "https://randomuser.me/api/portraits/men/62.jpg", matiere: "Histoire-Géo", experience: "11 ans", bio: "Spécialiste de l'histoire du Maroc. Méthode interactive avec cartes et documents d'époque.", diplome: "Doctorat en Histoire", telephone: "0612345607", email: "hassan.ouazzani@nourtamuda.ma" },
    { id: 8, nom: "Prof. Leila Amrani", photo: "https://randomuser.me/api/portraits/women/33.jpg", matiere: "Informatique", experience: "6 ans", bio: "Ingénieure en informatique, spécialiste Python et développement web. Cours de programmation pour tous niveaux.", diplome: "Ingénieur Informatique", telephone: "0612345608", email: "leila.amrani@nourtamuda.ma" }
];

const DEFAULT_OFFRES = [
    { id: 1, nom: "Cours Individuel", prix: "300 MAD", duree: "2h/semaine", matieres: ["Toutes matières"], niveau: "Tous niveaux", description: "Suivi personnalisé avec un professeur dédié. Programme adapté aux besoins spécifiques de l'élève.", popularite: 5, avantages: ["Professeur dédié", "Horaires flexibles", "Suivi personnalisé"] },
    { id: 2, nom: "Petit Groupe (3 él.)", prix: "200 MAD", duree: "2h/semaine", matieres: ["Toutes matières"], niveau: "Tous niveaux", description: "Apprentissage collaboratif en petit groupe. Émulation et entraide garanties.", popularite: 4, avantages: ["Ambiance collaborative", "Prix abordable", "Interaction maximale"] },
    { id: 3, nom: "Grand Groupe (8 él.)", prix: "150 MAD", duree: "2h/semaine", matieres: ["Toutes matières"], niveau: "Tous niveaux", description: "Cours collectifs économiques et efficaces. Idéal pour les révisions.", popularite: 4, avantages: ["Très économique", "Dynamique de groupe", "Cours structurés"] },
    { id: 4, nom: "Pack Intensif BAC", prix: "500 MAD", duree: "5h/semaine", matieres: ["Maths", "Physique", "SVT", "Français", "Philo", "Anglais"], niveau: "Lycée", description: "Préparation intensive aux examens du baccalauréat. Simulations d'examens et correction personnalisée.", popularite: 5, avantages: ["Préparation complète", "Simulations d'examens", "Corrections détaillées"] },
    { id: 5, nom: "Cours à Domicile", prix: "400 MAD", duree: "2h/semaine", matieres: ["Toutes matières"], niveau: "Tous niveaux", description: "Le professeur se déplace à votre domicile. Confort et flexibilité maximum.", popularite: 4, avantages: ["Déplacement inclus", "Confort maximal", "Horaires flexibles"] },
    { id: 6, nom: "Stage Intensif Vacances", prix: "800 MAD", duree: "1 semaine (15h)", matieres: ["Toutes matières"], niveau: "Tous niveaux", description: "Stage de révision pendant les vacances scolaires. Rattrapage et préparation.", popularite: 4, avantages: ["Intensif", "Résultats rapides", "Programme concentré"] },
    { id: 7, nom: "Préparation Concours", prix: "600 MAD", duree: "3h/semaine", matieres: ["Maths", "Français", "Culture générale"], niveau: "Lycée+", description: "Préparation spécifique aux concours d'entrée aux grandes écoles.", popularite: 3, avantages: ["Ciblé concours", "Annales corrigées", "Méthodologie spécifique"] }
];

const DEFAULT_GALERIE = [
    { id: 1, url: "https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=400&fit=crop", titre: "Salle de cours principale", categorie: "Salles", date: "2024-01-15" },
    { id: 2, url: "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&h=400&fit=crop", titre: "Bibliothèque et espace lecture", categorie: "Espaces", date: "2024-01-15" },
    { id: 3, url: "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&h=400&fit=crop", titre: "Salle informatique", categorie: "Équipements", date: "2024-01-20" },
    { id: 4, url: "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=600&h=400&fit=crop", titre: "Salle de réunion parents-profs", categorie: "Espaces", date: "2024-01-20" },
    { id: 5, url: "https://images.unsplash.com/photo-1562774053-701939374585?w=600&h=400&fit=crop", titre: "Cour extérieure et jardin", categorie: "Extérieur", date: "2024-02-01" },
    { id: 6, url: "https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&h=400&fit=crop", titre: "Laboratoire de sciences", categorie: "Équipements", date: "2024-02-01" },
    { id: 7, url: "https://images.unsplash.com/photo-1551721434-8b94ddff0e6d?w=600&h=400&fit=crop", titre: "Salle d'étude calme", categorie: "Espaces", date: "2024-02-10" },
    { id: 8, url: "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&h=400&fit=crop", titre: "Amphithéâtre", categorie: "Salles", date: "2024-02-10" },
    { id: 9, url: "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&h=400&fit=crop", titre: "Espace détente", categorie: "Espaces", date: "2024-02-15" },
    { id: 10, url: "https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&h=400&fit=crop", titre: "Salle de sport", categorie: "Équipements", date: "2024-02-15" }
];

const DEFAULT_TEMOIGNAGES = [
    { id: 1, nom: "Ahmed Bennani", niveau: "Terminale BAC", note: 5, texte: "Grâce à NOURTAMUDA, j'ai obtenu mon bac avec mention Très Bien (18.5/20) ! Les professeurs sont exceptionnels et le suivi est personnalisé.", date: "2024-06-20", ville: "Tétouan" },
    { id: 2, nom: "Mme. Karima El Fassi", niveau: "Parent d'élève", note: 5, texte: "Mon fils a progressé de 4 points en mathématiques en seulement 3 mois. Je recommande vivement ce centre à tous les parents.", date: "2024-05-15", ville: "Tétouan" },
    { id: 3, nom: "Salma El Ouazzani", niveau: "3ème Collège", note: 4, texte: "Ambiance agréable, professeurs à l'écoute. Les cours sont très bien structurés et j'ai retrouvé confiance en moi.", date: "2024-04-10", ville: "Martil" },
    { id: 4, nom: "Omar Tazi", niveau: "1ère BAC", note: 5, texte: "Les séances de soutien m'ont permis de combler mes lacunes en physique-chimie. Maintenant je suis parmi les premiers de ma classe.", date: "2024-03-05", ville: "Fnideq" },
    { id: 5, nom: "Nadia Amrani", niveau: "Parent d'élève", note: 5, texte: "Mes deux enfants sont inscrits chez NOURTAMUDA depuis 2 ans. Les résultats sont impressionnants et l'équipe est très professionnelle.", date: "2024-02-20", ville: "Tétouan" },
    { id: 6, nom: "Rachid Belkacem", niveau: "BAC Sciences", note: 5, texte: "Préparation intensive qui a porté ses fruits ! Mention Bien au bac avec 16/20. Merci à toute l'équipe.", date: "2024-07-01", ville: "Tétouan" }
];

const DEFAULT_STATS = {
    eleves: 428,
    professeurs: 12,
    annees: 8,
    tauxReussite: 96,
    inscriptionsCetteAnnee: 156,
    tauxSatisfaction: 98,
    villesCouvertes: 5,
    heuresCours: 12500
};

const DEFAULT_PARAMETRES = {
    nomCentre: "NOURTAMUDA",
    slogan: "L'Excellence Scolaire à Tétouan",
    telephone: "+212 6 12 34 56 78",
    telephone2: "+212 5 39 87 65 43",
    email: "contact@nourtamuda.ma",
    adresse: "23 Avenue Mohamed V, Centre-ville, Tétouan, Maroc",
    horaires: "Lundi-Vendredi: 9h00-19h00, Samedi: 10h00-16h00",
    facebook: "https://facebook.com/nourtamuda",
    instagram: "https://instagram.com/nourtamuda",
    whatsapp: "https://wa.me/212612345678",
    linkedin: "https://linkedin.com/company/nourtamuda"
};

// ============================================================
// FONCTIONS D'INITIALISATION
// ============================================================

function initNourtamudaDB() {
    console.log("🔄 Initialisation de la base de données NOURTAMUDA...");
    
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.MATIERES)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.MATIERES, JSON.stringify(DEFAULT_MATIERES));
        console.log("✅ Matières initialisées");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.PROFESSEURS)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.PROFESSEURS, JSON.stringify(DEFAULT_PROFESSEURS));
        console.log("✅ Professeurs initialisés");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.OFFRES)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.OFFRES, JSON.stringify(DEFAULT_OFFRES));
        console.log("✅ Offres initialisées");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.GALERIE)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.GALERIE, JSON.stringify(DEFAULT_GALERIE));
        console.log("✅ Galerie initialisée");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.TEMOIGNAGES)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.TEMOIGNAGES, JSON.stringify(DEFAULT_TEMOIGNAGES));
        console.log("✅ Témoignages initialisés");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.MESSAGES)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.MESSAGES, JSON.stringify([]));
        console.log("✅ Messages initialisés");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.STATS)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.STATS, JSON.stringify(DEFAULT_STATS));
        console.log("✅ Statistiques initialisées");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.PARAMETRES)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.PARAMETRES, JSON.stringify(DEFAULT_PARAMETRES));
        console.log("✅ Paramètres initialisés");
    }
    if (!localStorage.getItem(NOURTAMUDA_DB_KEYS.NEWSLETTER)) {
        localStorage.setItem(NOURTAMUDA_DB_KEYS.NEWSLETTER, JSON.stringify([]));
        console.log("✅ Newsletter initialisée");
    }
    
    console.log("🎉 Base de données NOURTAMUDA prête !");
}

// ============================================================
// FONCTIONS D'ACCÈS AUX DONNÉES (GETTERS)
// ============================================================

function getMatieres() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.MATIERES) || '[]'); }
function getProfesseurs() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.PROFESSEURS) || '[]'); }
function getOffres() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.OFFRES) || '[]'); }
function getGalerie() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.GALERIE) || '[]'); }
function getTemoignages() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.TEMOIGNAGES) || '[]'); }
function getMessages() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.MESSAGES) || '[]'); }
function getStats() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.STATS) || '{}'); }
function getParametres() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.PARAMETRES) || '{}'); }
function getNewsletter() { return JSON.parse(localStorage.getItem(NOURTAMUDA_DB_KEYS.NEWSLETTER) || '[]'); }

// ============================================================
// FONCTIONS D'ÉCRITURE (SETTERS)
// ============================================================

function saveMatieres(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.MATIERES, JSON.stringify(data)); }
function saveProfesseurs(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.PROFESSEURS, JSON.stringify(data)); }
function saveOffres(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.OFFRES, JSON.stringify(data)); }
function saveGalerie(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.GALERIE, JSON.stringify(data)); }
function saveTemoignages(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.TEMOIGNAGES, JSON.stringify(data)); }
function saveMessages(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.MESSAGES, JSON.stringify(data)); }
function saveStats(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.STATS, JSON.stringify(data)); }
function saveParametres(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.PARAMETRES, JSON.stringify(data)); }
function saveNewsletter(data) { localStorage.setItem(NOURTAMUDA_DB_KEYS.NEWSLETTER, JSON.stringify(data)); }

// ============================================================
// FONCTIONS CRUD AVANCÉES
// ============================================================

// Ajouter un message
function ajouterMessage(nom, email, tel, message) {
    const messages = getMessages();
    const newMessage = {
        id: Date.now(),
        nom: nom,
        email: email,
        tel: tel,
        message: message,
        date: new Date().toISOString(),
        lu: false
    };
    messages.push(newMessage);
    saveMessages(messages);
    return newMessage;
}

// Ajouter un email à la newsletter
function ajouterNewsletter(email) {
    const newsletter = getNewsletter();
    if (!newsletter.some(e => e.email === email)) {
        newsletter.push({
            id: Date.now(),
            email: email,
            date: new Date().toISOString(),
            actif: true
        });
        saveNewsletter(newsletter);
        return true;
    }
    return false;
}

// Compter les messages non lus
function getMessagesNonLus() {
    return getMessages().filter(m => !m.lu).length;
}

// Marquer un message comme lu
function marquerMessageLu(id) {
    const messages = getMessages();
    const index = messages.findIndex(m => m.id === id);
    if (index !== -1) {
        messages[index].lu = true;
        saveMessages(messages);
        return true;
    }
    return false;
}

// Supprimer un message
function supprimerMessage(id) {
    let messages = getMessages();
    messages = messages.filter(m => m.id !== id);
    saveMessages(messages);
}

// ============================================================
// FONCTIONS DE STATISTIQUES
// ============================================================

function calculerTauxReussite() {
    const stats = getStats();
    return stats.tauxReussite || 94;
}

function getNombreTotalEleves() {
    const stats = getStats();
    return stats.eleves || 428;
}

function incrementerInscription() {
    const stats = getStats();
    stats.eleves = (stats.eleves || 428) + 1;
    stats.inscriptionsCetteAnnee = (stats.inscriptionsCetteAnnee || 156) + 1;
    saveStats(stats);
    return stats;
}

// ============================================================
// FONCTIONS DE RECHERCHE ET FILTRAGE
// ============================================================

function rechercherMatieres(terme) {
    const matieres = getMatieres();
    return matieres.filter(m => 
        m.nom.toLowerCase().includes(terme.toLowerCase()) ||
        m.description.toLowerCase().includes(terme.toLowerCase())
    );
}

function filtrerMatieresParNiveau(niveau) {
    const matieres = getMatieres();
    if (niveau === 'all') return matieres;
    return matieres.filter(m => m.niveau.includes(niveau));
}

function rechercherProfesseurs(terme) {
    const professeurs = getProfesseurs();
    return professeurs.filter(p =>
        p.nom.toLowerCase().includes(terme.toLowerCase()) ||
        p.matiere.toLowerCase().includes(terme.toLowerCase())
    );
}

function getOffresParNiveau(niveau) {
    const offres = getOffres();
    if (niveau === 'all') return offres;
    return offres.filter(o => o.niveau === niveau || o.niveau === 'Tous niveaux');
}

// ============================================================
// FONCTIONS D'EXPORT
// ============================================================

function exporterDonneesJSON() {
    const exportData = {
        version: NOURTAMUDA_DB_VERSION,
        date: new Date().toISOString(),
        matieres: getMatieres(),
        professeurs: getProfesseurs(),
        offres: getOffres(),
        galerie: getGalerie(),
        temoignages: getTemoignages(),
        messages: getMessages(),
        stats: getStats(),
        parametres: getParametres(),
        newsletter: getNewsletter()
    };
    return JSON.stringify(exportData, null, 2);
}

function importerDonneesJSON(jsonData) {
    try {
        const data = JSON.parse(jsonData);
        if (data.matieres) saveMatieres(data.matieres);
        if (data.professeurs) saveProfesseurs(data.professeurs);
        if (data.offres) saveOffres(data.offres);
        if (data.galerie) saveGalerie(data.galerie);
        if (data.temoignages) saveTemoignages(data.temoignages);
        if (data.messages) saveMessages(data.messages);
        if (data.stats) saveStats(data.stats);
        if (data.parametres) saveParametres(data.parametres);
        if (data.newsletter) saveNewsletter(data.newsletter);
        return true;
    } catch (e) {
        console.error("Erreur lors de l'importation:", e);
        return false;
    }
}

// ============================================================
// FONCTIONS DE NETTOYAGE
// ============================================================

function reinitialiserBaseDonnees() {
    if (confirm("⚠️ ATTENTION : Cette action va supprimer TOUTES vos données et restaurer les valeurs par défaut. Êtes-vous sûr ?")) {
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.MATIERES);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.PROFESSEURS);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.OFFRES);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.GALERIE);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.TEMOIGNAGES);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.MESSAGES);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.STATS);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.PARAMETRES);
        localStorage.removeItem(NOURTAMUDA_DB_KEYS.NEWSLETTER);
        initNourtamudaDB();
        alert("✅ Base de données réinitialisée avec succès !");
        return true;
    }
    return false;
}

function nettoyerAnciensMessages(jours) {
    const messages = getMessages();
    const dateLimite = new Date();
    dateLimite.setDate(dateLimite.getDate() - jours);
    const nouveauxMessages = messages.filter(m => new Date(m.date) > dateLimite);
    saveMessages(nouveauxMessages);
    return messages.length - nouveauxMessages.length;
}

// ============================================================
// INITIALISATION AUTOMATIQUE
// ============================================================

// Initialiser la base au chargement
initNourtamudaDB();

// Exporter les fonctions pour les autres scripts
window.NOURTAMUDA_DB = {
    // Getters
    getMatieres, getProfesseurs, getOffres, getGalerie, getTemoignages, getMessages, getStats, getParametres, getNewsletter,
    // Setters
    saveMatieres, saveProfesseurs, saveOffres, saveGalerie, saveTemoignages, saveMessages, saveStats, saveParametres, saveNewsletter,
    // CRUD avancé
    ajouterMessage, ajouterNewsletter, getMessagesNonLus, marquerMessageLu, supprimerMessage,
    // Statistiques
    calculerTauxReussite, getNombreTotalEleves, incrementerInscription,
    // Recherche
    rechercherMatieres, filtrerMatieresParNiveau, rechercherProfesseurs, getOffresParNiveau,
    // Export/Import
    exporterDonneesJSON, importerDonneesJSON,
    // Maintenance
    reinitialiserBaseDonnees, nettoyerAnciensMessages
};

console.log("📦 Module DB chargé - Version " + NOURTAMUDA_DB_VERSION);
