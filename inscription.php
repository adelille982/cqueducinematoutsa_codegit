<?php
    include "header.php";
?>
<br>
<br>
<br>
<br>

<form>
  <fieldset>
    <legend style="text-align: center;">INSCRIVEZ-VOUS</legend>

    <div class="form-group">
      <label for="emailInput" class="form-label mt-4">Votre Email:</label>
      <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Entrez votre email ici">
    </div>

    <div class="form-group">
      <label for="passwordInput" class="form-label mt-4">Entrez votre mot de passe:</label>
      <input type="password" class="form-control" id="passwordInput" placeholder="Password" autocomplete="off">
    </div>

    <div class="form-group">
      <label for="lastNameInput" class="form-label mt-4">Entrez votre nom:</label>
      <input type="text" class="form-control" id="lastNameInput" placeholder="Entrez votre nom de famille ici">
    </div>

    <div class="form-group">
      <label for="firstNameInput" class="form-label mt-4">Entrez votre prénom:</label>
      <input type="text" class="form-control" id="firstNameInput" placeholder="Entrez votre prénom ici">
    </div>

    <div class="form-group">
      <label for="dobInput" class="form-label mt-4">Entrez votre date de naissance</label>
      <input type="date" class="form-control" id="dobInput" placeholder="Entrez votre date de naissance ici">
    </div>

    <br>
    <div style="text-align: center;">
        <button type="submit" class="btn btn-primary">SOUMETTRE</button>
    </div>
  </fieldset>
</form>


<?php
    include "footer.php";
?>