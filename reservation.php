<?php
include "header.php";
?>

<br>
<br>
<br>
<br>

<!-- Formulaire de réservation initial -->
<form style="text-align: center;" onsubmit="return calculateTotalPrice();">
    <fieldset>

        <legend>RÉSERVATION DE SÉANCE</legend>


    <!-- Sélection du film -->
    <div class="form-group">
      <label for="movieId3" class="form-label mt-4">TITRE DU FILM:</label>
      <select class="form-control" id="movieId3" name="movieId3">
        <!-- Options générées dynamiquement à partir de la base de données -->
      </select>
    </div>

    <script>
      // Fonction pour charger la liste des films depuis la base de données pour le deuxième formulaire
      function loadMovies3() {
        fetch('votre_script_php_pour_charger_les_films.php')
          .then(response => response.json())
          .then(data => {
            const movieSelect = document.getElementById('movieId3');
            data.forEach(movie => {
              const option = document.createElement('option');
              option.value = movie.ID;
              option.textContent = movie.movie_title;
              movieSelect.appendChild(option);
            });
          })
          .catch(error => console.error(error));
      }

      // Appel des fonctions pour charger les listes déroulantes au chargement de la page
      document.addEventListener('DOMContentLoaded', () => {
        loadMovies3();
      });
    </script>

        <br>

        <script>
      // Fonction pour charger la liste des films depuis la base de données pour le deuxième formulaire
      function loadMovies2() {
        fetch('votre_script_php_pour_charger_les_films.php')
          .then(response => response.json())
          .then(data => {
            const movieSelect = document.getElementById('movieId2');
            data.forEach(movie => {
              const option = document.createElement('option');
              option.value = movie.ID;
              option.textContent = movie.movie_title;
              movieSelect.appendChild(option);
            });
          })
          .catch(error => console.error(error));
      }

      // Appel de loadMovies2 pour le deuxième formulaire
      document.addEventListener('DOMContentLoaded', () => {
        loadMovies2();
      });
    </script>

        <br>

        <!-- Sélection de la séance -->
        <div class="form-group">
      <?php $dataHours = printDate(); ?>
      <label for="sessionId" class="form-label mt-4">DATE ET HEURE DE LA SÉANCE</label>
      <select class="form-control" id="sessionId" name="session_id">
        <option value="">DATE ET HEURE DE LA SÉANCE</option>
        <?php foreach ($dataHours as $dataHour) : ?>
          <option value="<?= $dataHour['ID'] ?>"><?= $dataHour['date_and_time_of_session'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>


        <br>

        <!-- Nombre de places -->
        <div class="form-group">
            <p>
                <label for="numberOfSeats">NOMBRE DE PLACE SOUHAITÉ:</label>
            </p>
            <input type="number" id="numberOfSeats" name="numberOfSeats" min="1" max="100">
        </div>

        <br>

        <div id="totalPrice" style="margin-top: 20px;">
            Prix Total: <span id="priceDisplay">0</span> €
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