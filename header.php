<?php
  require "_connec.php";
  require "function.php";
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
      <!-- Menu déroulant pour l'icône de connexion utilisateur -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Connexion
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="inscription.php">INSCRIPTION</a></li>
        <li><a class="dropdown-item" href="connexion_utlisateur.php">CONNEXION</a></li>
          <li><a class="dropdown-item" href="compte_utilisateur.php">MON COMPTE</a></li>
        </ul>
      </div>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Rechercher">
        <button class="btn btn-danger my-2 my-sm-0" type="submit"></i>RECHERCHER</button>
      </form>
    </div>
  </div>
</nav>
<div class="imageprincipal" id="imageHeader">
    <img src="./images/cinema_vintage.png">
</div>
</header>