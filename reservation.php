<?php
include "header.php";
$pdo = connect_bd();

// Fonctions pour récupérer les informations nécessaires
function getMovies($pdo)
{
  $stmt = $pdo->query("SELECT ID, movie_title FROM movie_information");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCinemas($pdo)
{
  $stmt = $pdo->query("SELECT ID, room_name FROM movie_theater");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSessions($pdo, $movieId)
{
  $stmt = $pdo->prepare("SELECT ID, date_and_time_of_session FROM session WHERE movie_id = ?");
  $stmt->execute([$movieId]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer les paramètres de l'URL si disponibles
$selectedMovieId = $_GET['movie_id'] ?? null;
$selectedCinemaId = $_GET['cinema_id'] ?? null;
$selectedSessionId = $_GET['session_id'] ?? null;

$movies = getMovies($pdo);
$cinemas = getCinemas($pdo);
$sessions = $selectedMovieId ? getSessions($pdo, $selectedMovieId) : [];

?>

<br>
<br>
<br>
<br>

<!-- Formulaire de réservation -->
<form style="text-align: center;">
  <fieldset>
    <legend>RÉSERVATION DE SÉANCE</legend>

    <!-- Sélection du film -->
    <div class="form-group">
      <label for="movieId3" class="form-label mt-4">TITRE DU FILM:</label>
      <select class="form-control" id="movieId3" name="movieId3">
        <?php foreach ($movies as $film) : ?>
          <option value="<?= $film['ID']; ?>" <?= $selectedMovieId == $film['ID'] ? 'selected' : ''; ?>>
            <?= htmlspecialchars($film['movie_title']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <br>

    <!-- Sélection du cinéma -->
    <div class="form-group">
      <label for="cinemaId3" class="form-label mt-4">CINÉMA:</label>
      <select class="form-control" id="cinemaId3" name="cinemaId3">
        <?php foreach ($cinemas as $cinema) : ?>
          <option value="<?= $cinema['ID']; ?>" <?= $selectedCinemaId == $cinema['ID'] ? 'selected' : ''; ?>>
            <?= htmlspecialchars($cinema['room_name']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <br>

    <!-- Sélection de la séance -->
    <div class="form-group">
      <label for="sessionId3" class="form-label mt-4">DATE ET HEURE DE LA SÉANCE:</label>
      <select class="form-control" id="sessionId3" name="sessionId3">
        <?php foreach ($sessions as $session) : ?>
          <option value="<?= $session['ID']; ?>" <?= $selectedSessionId == $session['ID'] ? 'selected' : ''; ?>>
            <?= htmlspecialchars($session['date_and_time_of_session']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <br>

    <!-- Nombre de places -->
    <div class="form-group">
      <label for="numberOfSeats3" class="form-label mt-4">NOMBRE DE PLACES SOUHAITÉ:</label>
      <input type="number" class="form-control" id="numberOfSeats3" name="numberOfSeats3" min="1" max="100">
    </div>

    <br>

    <div style="display: flex; justify-content: center;">
      <button type="submit" class="btn btn-danger">VALIDER VOTRE RÉSERVATION</button>
    </div>
  </fieldset>
</form>

<?php
include "footer.php";
?>