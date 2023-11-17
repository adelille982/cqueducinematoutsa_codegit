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
      <label for="userNameInput" class="form-label mt-4">Entrez votre nom d'utilisateur:</label>
      <input type="text" class="form-control" id="userName" placeholder="Entrez votre nom d'utilisateur ici">
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