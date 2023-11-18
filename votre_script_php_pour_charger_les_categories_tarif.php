<?php
// Inclure le fichier de configuration de la base de données
require_once 'function.php';

// Se connecter à la base de données
$pdo = connect_bd();

// Préparer et exécuter la requête SQL pour récupérer les catégories de tarif
$query = "SELECT ID, tariff_category_name FROM tarif_categorie";
$statement = $pdo->query($query);

// Récupérer les données sous forme de tableau associatif
$categoriesTarif = $statement->fetchAll(PDO::FETCH_ASSOC);

// Convertir en JSON et renvoyer la réponse
header('Content-Type: application/json');
echo json_encode($categoriesTarif);


