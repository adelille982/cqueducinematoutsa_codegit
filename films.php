<?php
include "header.php";
$pdo = connect_bd();

$searchResults = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $searchTerm = $_GET["search"];
    $searchTerm = '%' . $searchTerm . '%';
    $stmt = $pdo->prepare("SELECT * FROM movie_information WHERE movie_title LIKE ?");
    $stmt->bindParam(1, $searchTerm);
    $stmt->execute();
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$filmsToDisplay = !empty($searchResults) ? $searchResults : $pdo->query("SELECT ID, movie_title, synopsis, duration, release_date, movie_poster, trailer FROM movie_information")->fetchAll(PDO::FETCH_ASSOC);

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

?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<section>
    <div class="container custom-container">
        <?php foreach ($filmsToDisplay as $film) : ?>

            <br>
            <br>
            <br>
            <br>

            <div class="row mb-4">
                <!-- Section Image du Film -->
                <div class="col-md-4">
                    <img src="<?= htmlspecialchars($film['movie_poster']); ?>" class="img-fluid rounded-image" alt="<?= htmlspecialchars($film['movie_title']); ?>" width="300" height="150">
                </div>

                <!-- Section Informations et Sélecteurs -->
                <div class="col-md-8">
                    <div class="card-body text-center">
                        <h2 class="card-title"><?= htmlspecialchars($film['movie_title']); ?></h2><br>
                        <p><?= htmlspecialchars($film['synopsis']); ?></p>
                        <p>Durée : <?= htmlspecialchars($film['duration']); ?> minutes</p>
                        <p>Date de sortie : <?= htmlspecialchars($film['release_date']); ?></p>
                        <p>Bande-annonce : <a href="<?= htmlspecialchars($film['trailer']); ?>" target="_blank">Voir la bande-annonce</a></p>
                        <!-- Sélecteur de Cinéma -->
                        <div class="cinema-selector">
                            <p>Cinémas Disponibles :</p>
                            <select class="cinema-selector" name="cinema">
                                <?php foreach (getCinemas($pdo) as $cinema) : ?>
                                    <option value="<?= $cinema['ID']; ?>"><?= htmlspecialchars($cinema['room_name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <br>

                        <!-- Sélecteur de Séance -->
                        <div class="session-selector">
                            <p>Séances Disponibles :</p>
                            <select class="session-selector" name="session">
                                <?php foreach (getSessions($pdo, $film['ID']) as $session) : ?>
                                    <option value="<?= $session['ID']; ?>"><?= htmlspecialchars($session['date_and_time_of_session']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <br>

                        <!-- Bouton Réservation -->
                        <button onclick="redirectToReservation(<?= $film['ID']; ?>, this)" class="btn btn-primary">Réservation</button>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <hr>
            <br>
            <br>

        <?php endforeach; ?>
    </div>
</section>

<script>
    function redirectToReservation(movieId, buttonElement) {
        var cinemaSelector = buttonElement.closest('.card-body').querySelector('.cinema-selector');
        var sessionSelector = buttonElement.closest('.card-body').querySelector('.session-selector');

        var selectedCinema = cinemaSelector.value;
        var selectedSession = sessionSelector.value;

        var reservationUrl = `reservation.php?movie_id=${movieId}&cinema_id=${selectedCinema}&session_id=${selectedSession}`;
        window.location.href = reservationUrl;
    }
</script>

<?php
include "footer.php";
?>