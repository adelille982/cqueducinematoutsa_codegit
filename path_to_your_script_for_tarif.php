<?php
session_start();
require_once 'function.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tarifCategory']) && isset($_POST['tarifPrice'])) {
    // Récupérer les données du formulaire
    $tarifCategory = $_POST['tarifCategory'];
    $tarifPrice = $_POST['tarifPrice'];

    try {
        // Se connecter à la base de données
        $pdo = connect_bd();

        // Commencer une transaction
        $pdo->beginTransaction();

        // Préparer la requête SQL pour insérer une nouvelle catégorie de tarif
        $queryCategory = "INSERT INTO tarif_categorie (category_name) VALUES (:category_name)";
        $statementCategory = $pdo->prepare($queryCategory);

        // Lier le paramètre nommé
        $statementCategory->bindValue(':category_name', $tarifCategory, PDO::PARAM_STR);

        // Exécuter la requête pour insérer la catégorie de tarif
        if ($statementCategory->execute()) {
            // Récupérer l'ID de la catégorie de tarif insérée
            $tarifID = $pdo->lastInsertId();

            // Maintenant, insérez le prix correspondant dans la table 'tarification'
            $queryPrice = "INSERT INTO tarification (category_id, price) VALUES (:category_id, :price)";
            $statementPrice = $pdo->prepare($queryPrice);
            $statementPrice->bindValue(':category_id', $tarifID, PDO::PARAM_INT);
            $statementPrice->bindValue(':price', $tarifPrice, PDO::PARAM_STR);

            // Exécuter la requête pour insérer le prix
            if ($statementPrice->execute()) {
                // Valider la transaction
                $pdo->commit();
                $_SESSION['category_message'] = "Catégorie de tarif ajoutée avec succès !";
            } else {
                // Annuler la transaction en cas d'échec
                $pdo->rollBack();
                $_SESSION['category_message'] = "Erreur lors de l'ajout du prix pour la catégorie de tarif.";
            }
        } else {
            // Annuler la transaction en cas d'échec
            $pdo->rollBack();
            $_SESSION['category_message'] = "Erreur lors de l'ajout de la catégorie de tarif.";
        }
    } catch (PDOException $e) {
        $_SESSION['category_message'] = "Erreur de connexion à la base de données : " . $e->getMessage();
    }

    // Rediriger vers la page d'origine ou une autre page si nécessaire
    header('Location: admin.php');
    exit();
}
?>
