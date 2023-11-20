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
    <br>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>CATÉGORIE DE TARIF</th>
                <th>PRIX</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'function.php';
            $pdo = connect_bd();

            // Requête pour récupérer les informations des tarifs et des catégories
            $sql = "SELECT m.movie_title, t.category_name, f.price, f.session_time 
                    FROM tarification f 
                    LEFT JOIN movie_information m ON f.movie_id = m.ID 
                    LEFT JOIN tarif_categorie t ON f.category_id = t.ID";
            $tarifs = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tarifs as $tarif) {
                echo "<tr>";
                echo "<td>" . (!is_null($tarif['category_name']) ? htmlspecialchars($tarif['category_name']) : "Non spécifié") . "</td>";
                echo "<td>" . (!is_null($tarif['price']) ? htmlspecialchars($tarif['price']) : "Non spécifié") . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>
    <br>
</main>

<?php include "footer.php"; ?>

