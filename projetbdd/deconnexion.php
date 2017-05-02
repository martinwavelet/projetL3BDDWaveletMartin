<?php include("includes/header.php"); 

  // On le vide intégralement
  $_SESSION = array();
  // Destruction de la session
  session_destroy();
  // Destruction du tableau de session
  unset($_SESSION);

echo "<div class='row'><p> Vous êtes déconnecté, à bientôt !</p></Div>";
include("includes/footer.php"); 
?>