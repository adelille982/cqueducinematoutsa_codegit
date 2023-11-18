<?php
session_start();
require_once 'function.php';


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movieId1'])) {
    $movieId = $_POST['movieId1']; // Utilisez le nom correct du champ dans votre formulaire
    $sessionDateTime = $_POST['sessionDateTime'];
    $roomId = $_POST['roomId1']; // Assurez-vous également d'utiliser le bon nom pour cette variable
    $availableSeats = $_POST['availableSeats'];
  
    try {
        $pdo = connect_bd();
  
        // Insérer la séance dans la table "session"
        $query = "INSERT INTO session (movie_id, date_and_time_of_session, room_id, availability_of_place) VALUES (:movieId, :sessionDateTime, :roomId, :availableSeats)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':movieId', $movieId, PDO::PARAM_INT);
        $statement->bindValue(':sessionDateTime', $sessionDateTime, PDO::PARAM_STR);
        $statement->bindValue(':roomId', $roomId, PDO::PARAM_INT);
        $statement->bindValue(':availableSeats', $availableSeats, PDO::PARAM_INT);
  
        if ($statement->execute()) {
            $_SESSION['seance_message'] = "Séance ajoutée avec succès.";
        } else {
            $_SESSION['seance_message'] = "Erreur lors de l'ajout de la séance.";
        }
    } catch (PDOException $e) {
        $_SESSION['seance_message'] = "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    
    // Rediriger vers la page d'origine ou une autre page si nécessaire
    header('Location: admin.php');
    exit();
  }
?>