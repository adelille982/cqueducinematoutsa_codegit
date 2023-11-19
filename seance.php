<?php
include "header.php";
?>

<br>
<br>
<br>
<br>
<br>

<section>
    <?php
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

        // Formater la date en français
        $dateFormatted = $formatter->format($date);

        // Afficher la date et les autres informations
        echo "<h2 style='text-align: center;'>$dateFormatted</h2><br>";
        echo "<p style='text-align: center;'>titre du film:</p>";
        echo "<p style='text-align: center;'>cinémas disponibles:</p><br>";
    }
    ?>
</section>


<?php
include "footer.php";
?>