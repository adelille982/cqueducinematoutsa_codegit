<?php
    include "header.php";
?>

<br>
<br>
<br>
<br>

<div style="text-align: center;">
    <h1><strong>CONNEXION</strong></h1>
</div>

<form action="" method="post" style="text-align: center;">
    <div>
        <p>
        <label for="identifiant">Identifiant:</label>
        </p>
        <input type="text" id="identifiant" name="identifiant" required>
    </div> 
    <div>
        <p>
        <label for="mot_de_passe">Mot de passe :</label>
        </p>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
    </div>
    <div class="button">
        <br>
        <p>
        <a href="inscription.php" type="submit" class="btn btn-primary">INSCRIPTION</a>
        </p>
    </div>
    <div class="button">
        <p>
        <button type="submit" class="btn btn-danger">CONNEXION</button>
        </p>
    </div>
</form>


<?php
    include "footer.php";
?>