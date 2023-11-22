<?php
require_once "_connec.php";
function getLoggedInUserId()
{
    return isset($_SESSION['ID']) ? $_SESSION['ID'] : null;
}

// Utilisation de la fonction pour obtenir l'ID de l'utilisateur
$user_id = getLoggedInUserId();


function connect_bd()
{
    $pdo = new PDO(DSN, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
