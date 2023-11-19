<?php
// Inclure le fichier de configuration de la base de données
require_once 'function.php';
function updateCategoty()
{
    $pdo = connect_bd();
    $query = "SELECT * FROM tarif_categorie";
    $statement = $pdo->query($query);
    $statement->execute();
    $categoriesTarifs = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $categoriesTarifs;
}
