<?php include("includes/header.php"); 

/* On regarde si l'utilisateur viens d'utiliser le formulaire */
if(ISSET($_POST["pseudo"]) AND ISSET($_POST["mdp"])){

	$_SESSION["utilisateur"]= $db->querySingle('SELECT id_utilisateur FROM utilisateur WHERE pseudo="'.$_POST["pseudo"].'" AND mdp="'.$_POST["mdp"].'"');
	$_SESSION["pseudo"]= $db->querySingle("SELECT pseudo FROM utilisateur WHERE id_utilisateur=".$_SESSION["utilisateur"]);

	if(ISSET($_SESSION["utilisateur"])){ ?>
		<br/>
		<div class='row'>
			<h3> Bonjour <?php echo $_SESSION["pseudo"] ?>, vous êtes bien identifié !</h3><br/>
			<a class='button' href='index.php'> Retourner à l'acceuil </a>
		</div>
		<br/>"
	<?php
	}
	else{
		echo "<br/><div class='row'><h3> Mauvais login ou mot de passe !</h3></div>";
		include("includes/formulaireconnection.php");
	}
	
}
/* Sinon on affiche le formulaire*/
else{
	echo "<div class='row'><p> Si vous n'avez pas de compte vous pouvez vous <a href='inscription.php'>inscrire</a> !</p></div>";
	include("includes/formulaireconnection.php");
}

include("includes/footer.php"); 
?>