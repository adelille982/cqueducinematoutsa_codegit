<?php
include "header.php";
?>

<br>
<br>
<br>
<br>
<br>

<main class="container mt-4">
    <h1 class="text-center mb-4">TARIFS DES FILMS</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>FILM</th>
                <th>CATÉGORIE DE TARIF</th>
                <th>PRIX</th>
                <th>HORAIRE DE SÉANCE</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les lignes de tableau seront générées dynamiquement en fonction des données de la base de données -->
            <!-- Exemple de ligne de tableau -->
            <tr>
                <td>Nom du Film</td>
                <td>Nom de la Catégorie de Tarif</td>
                <td>Prix</td>
                <td>Heure de la Séance</td>
            </tr>
            <!-- Répétez pour chaque combinaison de film et de tarif -->
        </tbody>
    </table>
</main>

<?php
include "footer.php";
?>