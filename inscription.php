<?php
include "header.php";
?>

<br>
<br>
<br>
<br>

<form action="path_to_your_script_for_utlisateur.php" method="post">
  <fieldset>
    <legend style="text-align: center;">INSCRIVEZ-VOUS</legend>

    <!-- Nom -->
    <div class="form-group">
      <label for="userName" class="form-label mt-4">NOM D'UTILISATEUR:</label>
      <input type="text" class="form-control" id="userName" name="userName" placeholder="Nom de l'utilisateur" required>
    </div>

    <!-- Email -->
    <div class="form-group">
      <label for="userEmail" class="form-label mt-4">EMAIL:</label>
      <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email de l'utilisateur" required>
    </div>

    <!-- Mot de Passe -->
    <div class="form-group">
      <label for="userPassword" class="form-label mt-4">MOT DE PASSE:</label>
      <input type="password" class="form-control" id="userPassword" name="userPassword" required>
    </div>

    <br>

    <div style="text-align: center;">
      <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>

<?php
if (isset($_SESSION['user_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['user_message'] . "</p></div>";
  unset($_SESSION['user_message']);
}

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
?>


<?php
include "footer.php";
?>