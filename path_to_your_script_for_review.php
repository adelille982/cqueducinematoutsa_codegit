<?php
session_start();
?>
<?php
require_once 'function.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId']) && isset($_POST['reviewComment']) && isset($_POST['movieId'])) {
    // Récupérer les données du formulaire
    $userId = $_POST['userId'];
    $reviewComment = $_POST['reviewComment'];
    $movieId = $_POST['movieId'];

    try {
        // Se connecter à la base de données
        $pdo = connect_bd();

        // Préparer la requête SQL
        $query = "INSERT INTO Review_and_Rating (movie_id, user_id, comment) VALUES (:movieId, :userId, :reviewComment)";
        $statement = $pdo->prepare($query);

        // Lier les paramètres
        $statement->bindValue(':movieId', $movieId, PDO::PARAM_INT);
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->bindValue(':reviewComment', $reviewComment, PDO::PARAM_STR);

        // Exécuter la requête
        $statement->execute();

        // Après l'exécution réussie de la requête
        $_SESSION['review_message'] = "Avis ajouté avec succès !";
        header('Location: admin.php');
        exit();
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
