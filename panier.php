<?php
    include "header.php";
?>

<br>
<br>
<br>
<br>
<br>

<h2 style="text-align: center;">VOTRE PANIER EN COURS</h2><br>

<section class="panier">
    <table>
        <thead>
            <tr>
                <th>Film</th>
                <th>Date/Heure</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <!-- Les lignes des articles seront ajoutées ici -->
            <tr>
                <td>Titre du film</td>
                <td>12/12/2023 20:00</td>
                <td>2</td>
                <td>20€</td>
                <td><button>SUPPRIMER</button></td>
            </tr>
                <!-- Répétez les lignes pour chaque article dans le panier -->
        </tbody>
    </table>
<div class="validation-panier" style="text-align: center;">
    <button type="button" class="btn btn-success">PASSEZ À LA CAISSE</button>
</div>

</section>

<?php
    include "footer.php";
?>