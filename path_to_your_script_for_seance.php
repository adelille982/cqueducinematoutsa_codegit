<?php
session_start();
require_once 'function.php';


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movieId'])) {
    // Récupérer les données du formulaire
    $movieId = $_POST['movieId'];
    $sessionDateTime = $_POST['sessionDateTime'];
    $roomId = $_POST['roomId'];
    $availableSeats = $_POST['availableSeats'];

    try {
        // Se connecter à la base de données
        $pdo = connect_bd();

        // Préparer la requête SQL pour insérer dans la table "session"
        $query = "INSERT INTO session (movie_id, date_and_time_of_session, room_id, availability_of_place) VALUES (:movieId, :sessionDateTime, :roomId, :availableSeats)";
        $statement = $pdo->prepare($query);

        // Lier les paramètres
        $statement->bindValue(':movieId', $movieId, PDO::PARAM_INT);
        $statement->bindValue(':sessionDateTime', $sessionDateTime, PDO::PARAM_STR);
        $statement->bindValue(':roomId', $roomId, PDO::PARAM_INT);
        $statement->bindValue(':availableSeats', $availableSeats, PDO::PARAM_INT);

        // Exécuter la requête
        if ($statement->execute()) {
            $_SESSION['seance_message'] = "Séance ajoutée avec succès !";
            header('Location: admin.php'); // Rediriger vers la page d'origine ou une autre page si nécessaire
            exit();
        } else {
            $_SESSION['seance_message'] = "Erreur lors de l'ajout de la séance.";
        }
    } catch(PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
?>