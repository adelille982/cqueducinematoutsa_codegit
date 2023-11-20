<?php
include "header.php";
?>

<br>
<br>
<br>
<br>

<?php

// Connexion à la base de données
$pdo = connect_bd();

// Définir le début de la semaine (lundi)
$debutSemaine = new DateTime('monday this week');

// Créer un formateur de date international
$formatter = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN
);

// Boucler pour chaque jour de la semaine
for ($i = 0; $i < 7; $i++) {
    // Cloner la date de début et ajouter le nombre de jours
    $date = clone $debutSemaine;
    $date->modify("+$i days");

    // Insérer une ligne horizontale avant chaque date
    if ($i > 0) { // Pour éviter d'avoir un <hr> avant la première date
        echo "<hr>";
    }

    // Formater la date en français
    $dateFormatted = $formatter->format($date);

    // Afficher la date
    echo "<h2 style='text-align: center; font-size: 50px;'>$dateFormatted</h2><br>";

    // Requête pour récupérer les séances de cette date
    $stmt = $pdo->prepare("SELECT movie_information.movie_title, movie_information.movie_poster, movie_information.synopsis, movie_theater.room_name, session.date_and_time_of_session 
                            FROM session 
                            JOIN movie_information ON session.movie_id = movie_information.ID 
                            JOIN movie_theater ON session.room_id = movie_theater.ID 
                            WHERE DATE(date_and_time_of_session) = ?");
    $stmt->execute([$date->format('Y-m-d')]);
    $sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les séances pour chaque jour
    foreach ($sessions as $session) {
        // Afficher l'image du film
        echo "<div style='text-align: center;'>";
        echo "<img src='" . htmlspecialchars($session['movie_poster']) . "' class='img-fluid rounded-image' alt='" . htmlspecialchars($session['movie_title']) . "' width='300' height='150'>";
        echo "</div><br>";

        echo "<strong><p style='text-align: center; font-size: 20px;'>Titre du film:<br> " . htmlspecialchars($session['movie_title']) . "</p></strong>";
        echo "<strong><p style='text-align: center; font-size: 20px; max-width: 600px; margin: auto; overflow-wrap: break-word;'>Synopsis:<br> " . htmlspecialchars($session['synopsis']) . "</p></strong><br>";
        echo "<strong><p style='text-align: center; font-size: 20px;'>Cinéma:<br> " . htmlspecialchars($session['room_name']) . "</p></strong><br>";
        echo "<strong><p style='text-align: center; font-size: 20px;'>Heure de la séance:<br> " . htmlspecialchars($session['date_and_time_of_session']) . "</p></strong>";
    }

    if (empty($sessions)) {
        echo "<strong><p style='text-align: center;'>Pas de séances disponibles pour ce jour.</p></strong><br>";
    }
}
?>

<?php
include "footer.php";
?>