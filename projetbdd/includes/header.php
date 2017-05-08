<?php
session_start(); 
$db = new SQLite3('bdd.db');
?>

<html>

<head>
   <meta charset="utf-8"/>
     <title>Base de données jeux vidéos</title>
     <link rel="stylesheet" href="assets/css/foundation.min.css">
     <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>


<img class="background" src="images/header.jpg" alt="header">

<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" >
      <li class="menu-text">Vendre mes Jeux Vidéos</li>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="acheter.php">Acheter un jeu</a></li>
      <li><a href="vendre.php">Vendre un jeu</a></li>
      <li><a href="gerer.php">Gérer mes jeux</a></li>
      <li><a href="membres.php">Les membres</a></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
      <?php
        if(ISSET($_SESSION["utilisateur"])){
          echo "<li><p> Bonjour ".$_SESSION["pseudo"]."</p></li>";
          echo "<li><a>     </a></li>";
          echo "<li><a class='button' href='deconnection.php'>Déconnection</a></li>";
        }
        else{

      ?>
      <li><a class="button" href="connection.php">Se connecter</a></li>
      <li><a>     </a></li>
      <li><a class="button" href="inscription.php">S'inscrire</a></li>
      <?php } ?>
    </ul>
  </div>
</div>
<br />