<?php
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
        <input type="number" class="form-control" id="numberOfRooms" name="numberOfRooms" min="1" max="100" required>
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

<br>
<hr>
<br>

<form action="votre_script_php.php" method="post">
  <fieldset>
    <legend style="text-align: center;">RAJOUTER UNE SÉANCE</legend>

    <!-- Sélection du film -->
    <div class="form-group">
      <label for="movieId" class="form-label mt-4">TITRE DU FILM:</label>
      <select class="form-control" id="movieId" name="movieId">
        <!-- Options générées dynamiquement à partir de la base de données -->
        <!-- <option value="id_du_film">Nom du film</option> -->
      </select>
    </div>

    <!-- Date et heure de la séance -->
    <div class="form-group">
      <label for="sessionDateTime" class="form-label mt-4">DATE ET HEURE DE LA SÉANCE:</label>
      <input type="datetime-local" class="form-control" id="sessionDateTime" name="sessionDateTime" required>
    </div>

    <!-- Sélection du cinéma -->
    <div class="form-group">
      <label for="roomId" class="form-label mt-4">CINÉMA OÙ LA SÉANCE EST DISPONIBLE:</label>
      <select class="form-control" id="roomId" name="roomId">
        <!-- Options générées dynamiquement à partir de la base de données -->
        <!-- <option value="id_du_cinéma">Nom du cinéma</option> -->
      </select>
    </div>

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

<br>
<hr>
<br>

<form action="path_to_your_script_for_user.php" method="post">
  <fieldset>
    <legend style="text-align: center;">GESTION DES UTILISATEURS</legend>

    <!-- Nom -->
    <div class="form-group">
      <label for="userName" class="form-label mt-4">NOM:</label>
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

      <br>
    
    <div style="text-align: center;">
      <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>

<br>

<?php
    include "footer.php";
?>

