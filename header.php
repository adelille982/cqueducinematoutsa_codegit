<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<?php
require_once "function.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />
  <title>CQUEDUCINEMATOUTSA</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CQUEDUCINEMATOUTSA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="films.php">FILMS
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tarif.php">TARIFS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="seance.php">SÉANCES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reservation.php">RÉSERVATION</a>
            </li>
          </ul>
          <div style="margin-right: 30px;">
            <div class="navbar-nav ml-auto">
              <?php if (isset($_SESSION['username'])) : ?>
                <span class="navbar-text">
                  Bonjour, <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <a href="logout.php" class="btn btn-danger ml-2">Déconnexion</a>
              <?php else : ?>
                <a href="connexion_utilisateur.php" class="btn btn-primary">Connexion</a>
              <?php endif; ?>
            </div>
          </div>
          <!-- Menu déroulant pour l'icône de connexion utilisateur -->
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Espace utilisateur</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="inscription.php">INSCRIPTION</a></li>
              <li><a class="dropdown-item" href="compte_utilisateur.php">MON COMPTE</a></li>
            </ul>
          </div>
          <a href="panier.php">
            <i class="bi bi-cart3"></i>
          </a>
          <form class="d-flex" action="films.php" method="get">
            <input class="form-control me-sm-2" type="search" placeholder="Rechercher un film" name="search">
            <button class="btn btn-danger my-2 my-sm-0" type="submit">RECHERCHER</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="imageprincipal" id="imageHeader">
      <img src="./images/cinema_vintage.png">
    </div>
  </header>