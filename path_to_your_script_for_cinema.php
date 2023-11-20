<?php
session_start();
?>
<?php
require_once 'function.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cinemaName'])) {
    // Récupérer les données du formulaire
    $cinemaName = $_POST['cinemaName'];
    $cinemaAddress = $_POST['cinemaAddress'];
    $numberOfRooms = $_POST['numberOfRooms'];
    $cinemaCapacity = $_POST['cinemaCapacity'];
    $cinemaEquipment = $_POST['cinemaEquipment'];

    try {
        // Se connecter à la base de données
        $pdo = connect_bd();

        // Préparer la requête SQL
        $query = "INSERT INTO movie_theater (room_name, address, number_of_room, room_capacity, equipment) VALUES (:cinemaName, :cinemaAddress, :numberOfRooms, :cinemaCapacity, :cinemaEquipment)";
        $statement = $pdo->prepare($query);

        // Lier les paramètres
        $statement->bindValue(':cinemaName', $cinemaName, PDO::PARAM_STR);
        $statement->bindValue(':cinemaAddress', $cinemaAddress, PDO::PARAM_STR);
        $statement->bindValue(':numberOfRooms', $numberOfRooms, PDO::PARAM_INT);
        $statement->bindValue(':cinemaCapacity', $cinemaCapacity, PDO::PARAM_STR);
        $statement->bindValue(':cinemaEquipment', $cinemaEquipment, PDO::PARAM_STR);

        // Exécuter la requête
        $statement->execute();

        // Après l'exécution réussie de la requête
        $_SESSION['cinema_message'] = "Cinéma ajouté avec succès !";
        header('Location: admin.php');
        exit();
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
