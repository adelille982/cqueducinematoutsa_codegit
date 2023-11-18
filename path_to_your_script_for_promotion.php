<?php
session_start();
require_once 'function.php';

// Assurez-vous d'inclure votre fichier de configuration de la base de données et d'établir une connexion
$pdo = connect_bd();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['offerTitle']) && isset($_POST['offerDescription']) && isset($_POST['termAndCondition']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['offerStatus']) && isset($_POST['movieId3']) && isset($_POST['session_id']) && isset($_POST['category_id'])) {
    $offerTitle = $_POST['offerTitle'];
    $offerDescription = $_POST['offerDescription'];
    $termAndCondition = $_POST['termAndCondition'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $offerStatus = $_POST['offerStatus'];
    $movieId3 = $_POST['movieId3'];
    $sessionId = $_POST['session_id'];
    $categoryId = $_POST['category_id'];

    try {
        // Préparez et exécutez la requête SQL pour insérer la promotion/offre spéciale
        $query = "INSERT INTO promotion_and_special_offer (offer_title, offer_description, term_and_condition, start_date, end_date, offer_status, movie_id, session_id, category_id) VALUES (:offerTitle, :offerDescription, :termAndCondition, :startDate, :endDate, :offerStatus, :movieId3, :session, :category_id)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':offerTitle', $offerTitle, PDO::PARAM_STR);
        $statement->bindValue(':offerDescription', $offerDescription, PDO::PARAM_STR);
        $statement->bindValue(':termAndCondition', $termAndCondition, PDO::PARAM_STR);
        $statement->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $statement->bindValue(':endDate', $endDate, PDO::PARAM_STR);
        $statement->bindValue(':offerStatus', $offerStatus, PDO::PARAM_STR);
        $statement->bindValue(':movieId3', $movieId3, PDO::PARAM_INT);
        $statement->bindValue('session_id', $sessionId, PDO::PARAM_INT);
        $statement->bindValue(':category_id', $categoryId, PDO::PARAM_INT);

        if ($statement->execute()) {
            // La promotion/offre spéciale a été ajoutée avec succès
            $_SESSION['promotion_message'] = "Promotion/offre spéciale ajoutée avec succès.";
        } else {
            // Une erreur s'est produite lors de l'ajout de la promotion/offre spéciale
            $_SESSION['promotion_message'] = "Erreur lors de l'ajout de la promotion/offre spéciale.";
        }
    } catch (PDOException $e) {
        // Erreur de connexion à la base de données
        $_SESSION['promotion_message'] = "Erreur de connexion à la base de données : " . $e->getMessage();
    }

    // Rediriger vers la page d'origine ou une autre page si nécessaire
    header('Location: admin.php');
    exit();
}
?>