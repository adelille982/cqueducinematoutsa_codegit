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
            <p>
            <label for="movieId">FILM:</label>
            </p>
            <select id="movieId" name="movieId" onchange="updateSessionOptions()">
                <!-- Options générées dynamiquement à partir de la base de données -->
            </select>
        </div>

        <br>

        <!-- Sélection du cinéma -->
        <div class="form-group">
            <p>
            <label for="cinemaId">CINÉMA:</label>
            </p>
            <select id="cinemaId" name="cinemaId" onchange="updateSessionOptions()">
                <!-- Options générées dynamiquement à partir de la base de données -->
            </select>
        </div>

        <br>

        <!-- Sélection de la séance -->
        <div class="form-group">
            <p>
            <label for="sessionDateTime">DATE ET HEURE DE LA SÉANCE:</label>
            </p>
            <select id="sessionDateTime" name="sessionDateTime">
                <!-- Les options seront mises à jour dynamiquement en fonction du film et du cinéma sélectionnés -->
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