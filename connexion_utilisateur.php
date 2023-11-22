<?php
include("header.php");
?>

<?php
// Utilisation de la fonction pour obtenir l'ID de l'utilisateur
$user_id = getLoggedInUserId();

// Vérifiez si l'utilisateur est déjà connecté, redirigez vers index
if (isset($_SESSION['ID'])) {
    header("Location: index.php");
    exit();
}
?>

<br>
<br>
<br>
<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['mot_de_passe'];

    $pdo = connect_bd();

    // Vérifiez si 'identifiant' est un email ou un nom d'utilisateur
    if (filter_var($identifiant, FILTER_VALIDATE_EMAIL)) {
        // Connexion par email
        $query = $pdo->prepare("SELECT * FROM Utilisateur WHERE email_address = :identifiant");
    } else {
        // Connexion par nom d'utilisateur
        $query = $pdo->prepare("SELECT * FROM Utilisateur WHERE username = :identifiant");
    }

    $query->bindParam(":identifiant", $identifiant);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérifiez le mot de passe ici (utilisez password_verify si vous utilisez un hachage)
        if (password_verify($password, $user['password'])) {
            // Connexion réussie
            $_SESSION['ID'] = $user['ID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email_address'] = $user['email_address'];
            header('Location: compte_utilisateur.php');
            exit();
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Identifiant non trouvé";
    }
}
?>

<div style="text-align: center;">
    <h1><strong>CONNEXION</strong></h1>
</div>

<form action="" method="post" style="text-align: center;">
    <div>
        <p>
            <label for="identifiant">Identifiant:</label>
        </p>
        <input type="text" id="identifiant" name="identifiant" required>
    </div>
    <div>
        <p>
            <label for="mot_de_passe">Mot de passe :</label>
        </p>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
    </div>
    <div class="button">
        <br>
        <p>
            <a href="inscription.php" type="submit" class="btn btn-primary">INSCRIPTION</a>
        </p>
    </div>
    <div class="button">
        <p>
            <button type="submit" class="btn btn-danger">CONNEXION</button>
        </p>
    </div>
</form>

<?php
include("footer.php");
?>