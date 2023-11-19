<?php
// Inclure le fichier de configuration de la base de données
require_once 'function.php';
function printDate()
{
    $pdo = connect_bd();
    $query = "SELECT* FROM session";
    $statement = $pdo->query($query);
    $data = array(); // Créez un tableau pour stocker les données
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row; // Ajoutez chaque ligne de résultat au tableau
    }
    return $data;
}
