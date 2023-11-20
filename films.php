<?php
include "header.php";
?>

<br>
<br>
<br>
<br>
<br>

<h1 style="text-align: center;">NOS FILMS DISPONIBLES OU BIENTÔT DISPONIBLES</h1>

<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>
<br>

<?php
require_once 'function.php';
$pdo = connect_bd();

$searchResults = [];

// Traitement de la recherche
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $searchTerm = $_GET["search"];
    $searchTerm = '%' . $searchTerm . '%';

    // Préparation de la requête pour rechercher des films par titre
    $stmt = $pdo->prepare("SELECT * FROM movie_information WHERE movie_title LIKE ?");
    $stmt->bindParam(1, $searchTerm);
    $stmt->execute();
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Choix des données à afficher : résultats de recherche ou tous les films
$filmsToDisplay = !empty($searchResults) ? $searchResults : $pdo->query("SELECT ID, movie_title, synopsis, duration, release_date, movie_poster, trailer FROM movie_information")->fetchAll(PDO::FETCH_ASSOC);
?>

<section>
    <div class="container custom-container">
        <?php foreach ($filmsToDisplay as $film) : ?>
            <br>
            <br>
            <br>
            <div class="row mb-4">
                <!-- Section Image du Film -->
                <div class="col-md-4">
                    <img src="<?php echo htmlspecialchars($film['movie_poster']); ?>" class="img-fluid rounded-image" alt="<?php echo htmlspecialchars($film['movie_title']); ?>" width="300" height="150">
                </div>

                <!-- Section Informations et Sélecteurs -->
                <div class="col-md-8">
                    <div class="card-body text-center">
                        <h2 class="card-title"><?php echo htmlspecialchars($film['movie_title']); ?></h2><br>
                        <p class="card-text"><?php echo htmlspecialchars($film['synopsis']); ?></p>
                        <p class="card-text">Durée : <?php echo htmlspecialchars($film['duration']); ?> minutes</p>
                        <p class="card-text">Date de sortie : <?php echo htmlspecialchars($film['release_date']); ?></p>
                        <p class="card-text">Bande-annonce : <a href="<?php echo htmlspecialchars($film['trailer']); ?>" target="_blank">Voir la bande-annonce</a></p><br>
                        <div class="selector-container">
                            <!-- Sélecteur de Cinéma -->
                            <div class="cinema-selector">
                                <p>Cinémas Disponibles :</p>
                                <select id="cinemaSelector">
                                    <!-- Options de cinémas -->
                                </select>
                            </div>
                            <!-- Sélecteur de Séance -->
                            <div class="session-selector">
                                <p>Séances Disponibles :</p>
                                <select id="sessionSelector">
                                    <!-- Options de séances -->
                                </select>
                            </div>

                            <!-- Bouton Réservation -->
                            <div class="reservation-button">
                                <a href="reservation.php" class="btn btn-primary" id="reservationButton">Réservation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <hr>
        <?php endforeach; ?>
    </div>
</section>

<br>
<br>
<br>
<br>

<?php
include "footer.php";
?>