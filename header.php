<!DOCTYPE html>
<html>
    <head>


<link rel="stylesheet" href="header-1.css" />

<header class="site-header">
  <div class="wrapper site-header__wrapper">
    <a href="#index.php" class="brand">Gestionnaire de Carte de Visite</a>
    <nav class="nav">
      <button class="nav__toggle" aria-expanded="false" type="button">
        menu
      </button>
      <ul class="nav__wrapper">

        <li class="nav__item"><a href="list.php">List of card</a></li>
        <li class="nav__item"><a href="registration.php">Add Card</a></li>
        <li class="nav__item"><a href="modif.php">Delete Card</a></li>
        <li class="nav__item"><a href="deconnexion.php">Deconnexion</a></li>

      </ul>
    </nav>
  </div>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<?php

            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "CarteDeVisite";

            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$dbname);

            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            ;
        ?>
</head>
