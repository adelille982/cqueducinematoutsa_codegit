<?php
// Inclure le fichier de configuration de la base de données
require_once 'function.php';

// Se connecter à la base de données
$pdo = connect_bd();

// Préparer et exécuter la requête SQL pour récupérer les dates et heures de séance
$query = "SELECT ID, date_and_time_of_session FROM session";
$statement = $pdo->query($query);

$data = array(); // Créez un tableau pour stocker les données

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row; // Ajoutez chaque ligne de résultat au tableau
}

// Convertir en JSON et renvoyer la réponse
header('Content-Type: application/json');
echo json_encode($data);
?>
