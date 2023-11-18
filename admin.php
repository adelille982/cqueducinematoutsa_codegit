<?php
session_start();
include "header.php";
?>

<br>
<br>
<br>
<br>

<form action="path_to_your_script_for_movie.php" method="post">
  <fieldset>
    <legend style="text-align: center;">RAJOUTER UN FILM</legend>

    <div class="form-group">
        <label for="movieTitle" class="form-label mt-4">TITRE DU FILM:</label>
        <input type="text" class="form-control" id="movieTitle" name="movieTitle" placeholder="Entrez le titre du film ici" required>
    </div>

    <div class="form-group">
        <label for="movieSynopsis" class="form-label mt-4">SYNOPSIS DU FILM:</label>
        <textarea class="form-control" id="movieSynopsis" name="movieSynopsis" placeholder="Entrez le synopsis du film ici" required></textarea>
    </div>
    
    <div class="form-group">
        <label for="movieDuration" class="form-label mt-4">DURÉE DU FILM (en minutes):</label>
        <input type="number" class="form-control" id="movieDuration" name="movieDuration" placeholder="Durée du film en minutes" min="1" required>
    </div>

    <div class="form-group">
        <label for="movieReleaseDate" class="form-label mt-4">DATE DE SORTIE DU FILM:</label>
        <input type="date" class="form-control" id="movieReleaseDate" name="movieReleaseDate" required>
    </div>

    <div class="form-group">
        <label for="moviePoster" class="form-label mt-4">AFFICHE DU FILM (URL):</label>
        <input type="url" class="form-control" id="moviePoster" name="moviePoster" placeholder="URL de l'affiche du film">
    </div>

    <div class="form-group">
        <label for="movieTrailer" class="form-label mt-4">BANDE ANNONCE DU FILM (URL):</label>
        <input type="url" class="form-control" id="movieTrailer" name="movieTrailer" placeholder="URL de la bande-annonce du film">
    </div>

    <br>

    <div style="text-align: center;">
        <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>

<?php

if (isset($_SESSION['film_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['film_message'] . "</p></div>";
  unset($_SESSION['film_message']);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Récupérer les données du formulaire
    $movieTitle = $_POST['movieTitle'];
    $movieSynopsis = $_POST['movieSynopsis'];
    $movieDuration = $_POST['movieDuration'];
    $movieReleaseDate = $_POST['movieReleaseDate'];
    $moviePoster = $_POST['moviePoster'];
    $movieTrailer = $_POST['movieTrailer'];

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
  
    $_SESSION['film_message'] = "Film ajouté avec succès !"; // Message pour les films
    header('Location: admin.php');
    exit();
}
?>

<br>
<hr>
<br>

<form action="path_to_your_script_for_cinema.php" method="post">
  <fieldset>
    <legend style="text-align: center;">RAJOUTER UN CINÉMA</legend>

    <div class="form-group">
        <label for="cinemaName" class="form-label mt-4">NOM DU CINÉMA:</label>
        <input type="text" class="form-control" id="cinemaName" name="cinemaName" placeholder="Entrez le nom du cinéma ici" required>
    </div>

    <div class="form-group">
        <label for="cinemaAddress" class="form-label mt-4">ADRESSE DU CINÉMA:</label>
        <input type="text" class="form-control" id="cinemaAddress" name="cinemaAddress" placeholder="Entrez l'adresse du cinéma ici" required>
    </div>

    <div class="form-group">
        <label for="numberOfRooms" class="form-label mt-4">NOMBRE DE SALLES DANS LE CINÉMA:</label>
        <input type="number" class="form-control" id="numberOfRooms" name="numberOfRooms" min="1" max="1" required>
    </div>

    <div class="form-group">
        <label for="cinemaCapacity" class="form-label mt-4">CAPACITÉ DE LA SALLE:</label>
        <input type="number" class="form-control" id="cinemaCapacity" name="cinemaCapacity" min="1" max="100" required>
    </div>

    <div class="form-group">
        <label for="cinemaEquipment" class="form-label mt-4">ÉQUIPEMENTS DE LA SALLE:</label>
        <input type="text" class="form-control" id="cinemaEquipment" name="cinemaEquipment" placeholder="Liste des équipements" required>
    </div>

    <br>

    <div style="text-align: center;">
    <button type="submit" class="btn btn-primary">SOUMETTRE</button>
  </div>
</form>

<?php
if (isset($_SESSION['cinema_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['cinema_message'] . "</p></div>";
  unset($_SESSION['cinema_message']);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Récupérer les données du formulaire
    $cinemaName = $_POST['cinemaName'];
    $cinemaAddress = $_POST['cinemaAddress'];
    $numberOfRooms = $_POST['numberOfRooms'];
    $cinemaCapacity = $_POST['cinemaCapacity'];
    $cinemaEquipment = $_POST['cinemaEquipment'];

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
   
    // Rediriger vers la page admin.php ou une autre page de confirmation
    $_SESSION['cinema_message'] = "Cinéma ajouté avec succès !"; // Message pour les cinémas
    header('Location: admin.php');
    exit();
}
?>

<br>
<hr>
<br>

<form action="path_to_your_script_for_seance.php" method="post">
  <fieldset>
    <legend style="text-align: center;">RAJOUTER UNE SÉANCE</legend>

<!-- Sélection du film -->
<div class="form-group">
  <label for="movieId1" class="form-label mt-4">TITRE DU FILM:</label>
  <select class="form-control" id="movieId1" name="movieId1">
    <!-- Options générées dynamiquement à partir de la base de données -->
    <!-- <option value="id_du_film">Nom du film</option> -->
  </select>
</div>

<script>
// Fonction pour charger la liste des films depuis la base de données pour le premier formulaire
function loadMovies1() {
  fetch('votre_script_php_pour_charger_les_films.php')
    .then(response => response.json())
    .then(data => {
      const movieSelect = document.getElementById('movieId1');
      data.forEach(movie => {
        const option = document.createElement('option');
        option.value = movie.ID;
        option.textContent = movie.movie_title;
        movieSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

// Appel des fonctions pour charger les listes déroulantes au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
  loadMovies1();
});
</script>

<!-- Date et heure de la séance -->
<div class="form-group">
  <label for="sessionDateTime" class="form-label mt-4">DATE ET HEURE DE LA SÉANCE:</label>
  <input type="datetime-local" class="form-control" id="sessionDateTime" name="sessionDateTime" required>
</div>

<!-- Sélection du cinéma -->
<div class="form-group">
  <label for="roomId1" class="form-label mt-4">CINÉMA OÙ LA SÉANCE EST DISPONIBLE:</label>
  <select class="form-control" id="roomId1" name="roomId1">
    <!-- Options générées dynamiquement à partir de la base de données -->
    <!-- <option value="id_du_cinéma">Nom du cinéma</option> -->
  </select>
</div>

<script>
// Fonction pour charger la liste des cinémas depuis la base de données
function loadCinemas1() {
  fetch('votre_script_php_pour_charger_les_cinemas.php')
    .then(response => response.json())
    .then(data => {
      const cinemaSelect = document.getElementById('roomId1');
      data.forEach(cinema => {
        const option = document.createElement('option');
        option.value = cinema.ID;
        option.textContent = cinema.room_name;
        cinemaSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

// Appel des fonctions pour charger les listes déroulantes au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
  loadCinemas1();
});
</script>

<!-- Nombre de places disponibles -->
<div class="form-group">
  <label for="availableSeats" class="form-label mt-4">PLACES DISPONIBLE:</label>
  <input type="number" class="form-control" id="availableSeats" name="availableSeats" min="0" max="100" required>
</div>


    <!-- Bouton de soumission -->
    <br>
    <div style="text-align: center;">
    <button type="submit" class="btn btn-primary">SOUMETTRE</button>
  </div>
</form>

<?php
if (isset($_SESSION['seance_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['seance_message'] . "</p></div>";
  unset($_SESSION['seance_message']);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

<br>
<hr>
<br>

<form action="path_to_your_script_for_tarif.php" method="post">
  <fieldset>
    <legend style="text-align: center;">GESTION DES TARIFS</legend>

    <!-- Catégorie de Tarif -->
    <div class="form-group">
      <label for="tarifCategory" class="form-label mt-4">CATÉGORIE DE TARIF:</label>
      <input type="text" class="form-control" id="tarifCategory" name="tarifCategory" placeholder="Entrez le nom de la catégorie de tarif" required>
    </div>

    <!-- Prix -->
    <div class="form-group">
      <label for="tarifPrice" class="form-label mt-4">PRIX:</label>
      <input type="number" class="form-control" id="tarifPrice" name="tarifPrice" min="0" step="0.01" placeholder="Prix en euros" required>
    </div>

    <br>

    <div style="text-align: center;">
      <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>

<?php
if (isset($_SESSION['category_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['category_message'] . "</p></div>";
  unset($_SESSION['category_message']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

<br>
<hr>
<br>

<form action="path_to_your_script_for_user.php" method="post">
  <fieldset>
    <legend style="text-align: center;">GESTION DES UTILISATEURS</legend>

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
  } catch(PDOException $e) {
      $_SESSION['user_message'] = "Erreur de connexion à la base de données : " . $e->getMessage();
  }

  // Rediriger vers la page d'origine ou une autre page si nécessaire
  header('Location: admin.php');
  exit();
}
?>

<br>
<hr>
<br>



<form action="path_to_your_script_for_review.php" method="post">
  <fieldset>
    <legend style="text-align: center;">GESTION DES AVIS</legend>

    <!-- ID de l'Utilisateur -->
    <div class="form-group">
      <label for="userId" class="form-label mt-4">ID DE L'UTILISATEUR:</label>
      <input type="number" class="form-control" id="userId" name="userId" min="1" placeholder="ID de l'utilisateur" required>
    </div>

    <!-- Sélection du film -->
    <div class="form-group">
      <label for="movieId2" class="form-label mt-4">TITRE DU FILM:</label>
      <select class="form-control" id="movieId2" name="movieId">
        <!-- Options générées dynamiquement à partir de la base de données -->
      </select>
    </div>

    <script>
// Fonction pour charger la liste des films depuis la base de données pour le deuxième formulaire
function loadMovies2() {
  fetch('votre_script_php_pour_charger_les_films.php')
    .then(response => response.json())
    .then(data => {
      const movieSelect = document.getElementById('movieId2');
      data.forEach(movie => {
        const option = document.createElement('option');
        option.value = movie.ID;
        option.textContent = movie.movie_title;
        movieSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

// Appel de loadMovies2 pour le deuxième formulaire
document.addEventListener('DOMContentLoaded', () => {
  loadMovies2();
});
</script>

    <!-- Commentaire -->
    <div class="form-group">
      <label for="reviewComment" class="form-label mt-4">COMMENTAIRE:</label>
      <textarea class="form-control" id="reviewComment" name="reviewComment" placeholder="Commentaire" required></textarea>
    </div>

    <br>

    <div style="text-align: center;">
      <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>

<?php
if (isset($_SESSION['review_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['review_message'] . "</p></div>";
  unset($_SESSION['review_message']);
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId']) && isset($_POST['reviewComment'])) {
  // Récupérer les données du formulaire
  $userId = $_POST['userId'];
  $reviewComment = $_POST['reviewComment'];
  $movieId = $_POST['movieId'];

  try {
      // Se connecter à la base de données
      $pdo = connect_bd();

      // Vérifier si l'ID de l'utilisateur existe dans la base de données
      $userExistsQuery = "SELECT COUNT(*) FROM Users WHERE ID = :userId";
      $userExistsStatement = $pdo->prepare($userExistsQuery);
      $userExistsStatement->bindValue(':userId', $userId, PDO::PARAM_INT);
      $userExistsStatement->execute();
      $userExistsResult = $userExistsStatement->fetchColumn();

      if ($userExistsResult == 0) {
          $_SESSION['review_message'] = "L'ID de l'utilisateur n'existe pas.";
      } else {
          // Préparer la requête SQL pour insérer l'avis
          $query = "INSERT INTO Review_and_Rating (movie_id, user_id, comment) VALUES (:movieId, :userId, :reviewComment)";
          $statement = $pdo->prepare($query);

          // Lier les paramètres
          $statement->bindValue(':movieId', $movieId, PDO::PARAM_INT); // Si vous avez besoin de l'ID du film, assurez-vous de le récupérer correctement
          $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
          $statement->bindValue(':reviewComment', $reviewComment, PDO::PARAM_STR);

          // Exécuter la requête
          if ($statement->execute()) {
              $_SESSION['review_message'] = "Avis ajouté avec succès !";
          } else {
              $_SESSION['review_message'] = "Erreur lors de l'ajout de l'avis.";
          }
      }
  } catch(PDOException $e) {
      $_SESSION['review_message'] = "Erreur de connexion à la base de données: " . $e->getMessage();
  }

  // Rediriger vers la page d'origine ou une autre page si nécessaire
  header('Location: path_to_your_script_for_review.php');
  exit();
}
?>



<br>
<hr>
<br>

<form action="path_to_your_script_for_promotion.php" method="post">
  <fieldset>
    <legend style="text-align: center;">PROMOTIONS ET OFFRES SPÉCIALES</legend>

    <!-- Titre de l'Offre -->
    <div class="form-group">
      <label for="offerTitle" class="form-label mt-4">TITRE DE L'OFFRE:</label>
      <input type="text" class="form-control" id="offerTitle" name="offerTitle" placeholder="Titre de l'offre" required>
    </div>

    <!-- Description -->
    <div class="form-group">
      <label for="offerDescription" class="form-label mt-4">DESCRIPTION:</label>
      <textarea class="form-control" id="offerDescription" name="offerDescription" placeholder="Description de l'offre" required></textarea>
    </div>

    <!-- Conditions et termes -->
    <div class="form-group">
      <label for="termAndCondition" class="form-label mt-4">CONDITIONS ET TERMES:</label>
      <textarea class="form-control" id="termAndCondition" name="termAndCondition" placeholder="Conditions et termes de l'offre" required></textarea>
    </div>

    <!-- Date de début -->
    <div class="form-group">
      <label for="startDate" class="form-label mt-4">DATE DE DÉBUT:</label>
      <input type="date" class="form-control" id="startDate" name="startDate" required>
    </div>

    <!-- Date de fin -->
    <div class="form-group">
      <label for="endDate" class="form-label mt-4">DATE DE FIN:</label>
      <input type="date" class="form-control" id="endDate" name="endDate" required>
    </div>

    <!-- Statut de l'offre -->
    <div class="form-group">
      <label for="offerStatus" class="form-label mt-4">STATUT DE L'OFFRE:</label>
      <select class="form-control" id="offerStatus" name="offerStatus" required>
        <option value="disponible">Disponible</option>
        <option value="non_disponible">Plus disponible</option>
      </select>
    </div>

    <!-- Sélection du film -->
    <div class="form-group">
      <label for="movieId3" class="form-label mt-4">TITRE DU FILM:</label>
      <select class="form-control" id="movieId3" name="movieId3">
        <!-- Options générées dynamiquement à partir de la base de données -->
      </select>
    </div>

    <script>
      // Fonction pour charger la liste des films depuis la base de données pour le deuxième formulaire
function loadMovies3() {
  fetch('votre_script_php_pour_charger_les_films.php')
    .then(response => response.json())
    .then(data => {
      const movieSelect = document.getElementById('movieId3');
      data.forEach(movie => {
        const option = document.createElement('option');
        option.value = movie.ID;
        option.textContent = movie.movie_title;
        movieSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

// Appel des fonctions pour charger les listes déroulantes au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
  loadMovies3();
});
    </script>

    <!-- Sélection date et heure séance -->
    <div class="form-group">
      <label for="sessionId" class="form-label mt-4">DATE ET HEURE DE LA SÉANCE</label>
      <select class="form-control" id="sessionId" name="session_id">
        <!-- Options générées dynamiquement à partir de la base de données -->
      </select>
    </div>

    <script>
      // Fonction pour charger la liste des dates et heures de séance depuis la base de données
function loadSessionDateTime() {
  fetch('votre_script_php_pour_charger_les_dates_heures.php')
    .then(response => response.json())
    .then(data => {
      const sessionSelect = document.getElementById('sessionId'); // Changez le nom de l'ID ici
      data.forEach(session => {
        const option = document.createElement('option');
        option.value = session.ID;
        option.textContent = session.date_and_time;
        sessionSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

// Appel des fonctions pour charger les listes déroulantes au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
  loadSessionDateTime();
});
    </script>

    <!-- Sélection catégorie de tarif -->
    <div class="form-group">
      <label for="category_id" class="form-label mt-4">CATÉGORIE DE TARIF</label>
      <select class="form-control" id="category_id" name="category_id">
        <!-- Options générées dynamiquement à partir de la base de données -->
      </select>
    </div>
    
    <script>
      // Fonction pour charger la liste des catégories de tarif depuis la base de données
function loadCategoryTariff() {
  fetch('votre_script_php_pour_charger_les_categories_tarif.php')
    .then(response => response.json())
    .then(data => {
      const categoryIdSelect = document.getElementById('category_id');
      data.forEach(category => {
        const option = document.createElement('option');
        option.value = category.ID;
        option.textContent = category.tariff_category_name;
        categoryIdSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

// Appel des fonctions pour charger les listes déroulantes au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
  loadCategoryTariff();
});
    </script>

    <br>

    <div style="text-align: center;">
      <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>

<script>
  // Fonction pour charger la liste des dates et heures de séance depuis la base de données
function loadSessionDateTime() {
  fetch('votre_script_php_pour_charger_les_dates_heures.php')
    .then(response => response.json())
    .then(data => {
      const sessionSelect = document.getElementById('sessionId'); // Changez le nom de l'ID ici
      data.forEach(session => {
        const option = document.createElement('option');
        option.value = session.ID;
        option.textContent = session.date_and_time;
        sessionSelect.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}
</script>

<?php
// Assurez-vous d'inclure votre fichier de configuration de la base de données et d'établir une connexion
$pdo = connect_bd();

if (isset($_SESSION['promotion_message'])) {
  echo "<div style='text-align: center;'><p style='color: green;'>" . $_SESSION['promotion_message'] . "</p></div>";
  unset($_SESSION['promotion_message']);
}

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

<br>

<?php
    include "footer.php";
?>

