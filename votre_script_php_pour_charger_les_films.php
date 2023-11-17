<?php
// Inclure le fichier de configuration de la base de données
require_once 'function.php';

// Se connecter à la base de données
$pdo = connect_bd();

// Préparer et exécuter la requête SQL pour récupérer les films
$query = "SELECT ID, movie_title FROM movie_information";
$statement = $pdo->query($query);

// Récupérer les données sous forme de tableau associatif
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);

// Convertir en JSON et renvoyer la réponse
header('Content-Type: application/json');
echo json_encode($movies);
?>
