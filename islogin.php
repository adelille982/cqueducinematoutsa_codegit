<?php
// Démarre la session seulement si elle n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['username'])) {
    header("Location: connexion_utilisateur.php");
    exit();
}
$email = $_SESSION['email_address'];
