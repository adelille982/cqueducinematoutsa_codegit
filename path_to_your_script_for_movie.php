<?php
session_start();
require_once 'function.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movieTitle'])) {
    // Récupérer les données du formulaire
    $movieTitle = $_POST['movieTitle'];
    $movieSynopsis = $_POST['movieSynopsis'];
    $movieDuration = $_POST['movieDuration'];
    $movieReleaseDate = $_POST['movieReleaseDate'];
    $moviePoster = $_POST['moviePoster'];
    $movieTrailer = $_POST['movieTrailer'];

    try {
        // Se connecter à la base de données
        $pdo = connect_bd();

        // Préparer la requête SQL
        $query = "INSERT INTO movie_information (movie_title, synopsis, duration, release_date, movie_poster, trailer) VALUES (:movieTitle, :movieSynopsis, :movieDuration, :movieReleaseDate, :moviePoster, :movieTrailer)";
        $statement = $pdo->prepare($query);

        // Lier les paramètres
        $statement->bindValue(':movieTitle', $movieTitle, PDO::PARAM_STR);
        $statement->bindValue(':movieSynopsis', $movieSynopsis, PDO::PARAM_STR);
        $statement->bindValue(':movieDuration', $movieDuration, PDO::PARAM_INT);
        $statement->bindValue(':movieReleaseDate', $movieReleaseDate, PDO::PARAM_STR);
        $statement->bindValue(':moviePoster', $moviePoster, PDO::PARAM_STR);
        $statement->bindValue(':movieTrailer', $movieTrailer, PDO::PARAM_STR);

        // Exécuter la requête
        $statement->execute();

        // Après l'exécution réussie de la requête
        $_SESSION['film_message'] = "Film ajouté avec succès !";
        header('Location: admin.php');
        exit();
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
