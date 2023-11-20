<?php
session_start();
?>
<?php
require_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    try {
        // Se connecter à la base de données
        $pdo = connect_bd();

        // Hasher le mot de passe pour sécuriser le stockage
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $query = "INSERT INTO Utilisateur (username, email_address, password) VALUES (:username, :userEmail, :userPassword)";
        $statement = $pdo->prepare($query);

        // Lier les paramètres
        $statement->bindValue(':username', $userName, PDO::PARAM_STR);
        $statement->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
        $statement->bindValue(':userPassword', $hashedPassword, PDO::PARAM_STR);

        // Exécuter la requête
        if ($statement->execute()) {
            $_SESSION['user_message'] = "Utilisateur ajouté avec succès !";
        } else {
            $_SESSION['user_message'] = "Erreur lors de l'ajout de l'utilisateur.";
        }
    } catch (PDOException $e) {
        $_SESSION['user_message'] = "Erreur de connexion à la base de données : " . $e->getMessage();
    }

    // Rediriger vers la page d'origine ou une autre page si nécessaire
    header('Location: inscription.php');
    exit();
}