<?php
include('header.php');
?>

<br>
<br>
<br>
<br>

<?php
// Utilisation de la fonction pour obtenir l'ID de l'utilisateur
$user_id = getLoggedInUserId();

// Connexion à la base de données
$pdo = connect_bd();

// Initialisez la variable $reservations avec un tableau vide
$reservations = [];

// Requête pour récupérer les informations de l'utilisateur
if ($user_id) {
    $user_query = $pdo->prepare("SELECT * FROM Utilisateur WHERE ID = ?");
    $user_query->execute([$user_id]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);

    // Requête pour récupérer l'historique des réservations de l'utilisateur
    $reservations_query = $pdo->prepare("SELECT reservation.*, session.date_and_time_of_session, movie_information.movie_title 
                                         FROM reservation 
                                         JOIN session ON reservation.session_id = session.ID 
                                         JOIN movie_information ON session.movie_id = movie_information.ID
                                         WHERE reservation.user_id = ?");
    $reservations_query->execute([$user_id]);
    $reservations = $reservations_query->fetchAll(PDO::FETCH_ASSOC);
}

// Reste de votre code HTML avec la boucle foreach
?>



<section style="background-color: rgba(238, 238, 238, 0);">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom d'utilisateur</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= htmlspecialchars($user['username'] ?? 'Non spécifié'); ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Adresse Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= htmlspecialchars($user['email_address'] ?? 'Non spécifié'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>Historique des Réservations</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date et Heure de la Séance</th>
                            <th>Titre du Film</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation) : ?>
                            <tr>
                                <td><?= htmlspecialchars($reservation['date_and_time_of_session']); ?></td>
                                <td><?= htmlspecialchars($reservation['movie_title']); ?></td>
                                <td><?= htmlspecialchars($reservation['payment_status'] ? 'Payé' : 'Non Payé'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>
