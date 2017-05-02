<?php include("includes/header.php");

if(ISSET($_POST["pseudo"]) AND ISSET($_POST["mdp"]) AND ISSET($_POST["mail"])){
	
	$insert="INSERT INTO utilisateur(pseudo,mdp,mail) VALUES('".
		$_POST['pseudo']."','".
		$_POST['mdp']."','".
		$_POST['mail']."')";

	$db->exec($insert);
	
	echo "<br/><div class='row'><h3> Bienvenue ".$_POST['pseudo'].", vous êtes bien inscrit !</h3></div>";
	
	$_SESSION["utilisateur"]= $db->querySingle('SELECT id_utilisateur FROM utilisateur WHERE pseudo="'.$_POST["pseudo"].'" AND mdp="'.$_POST["mdp"].'"');
	$_SESSION["pseudo"]= $db->querySingle("SELECT pseudo FROM utilisateur WHERE id_utilisateur=".$_SESSION["utilisateur"]);
}

else{
?>
<form method="POST" action="inscription.php">
<div class="row">
	<h3> S'inscrire: </h3>
	
		<p>Pseudo
		<input type='text' name='pseudo'/></p>

		<p>Mot de passe
		<input type='password' name='mdp'/></p>

		<p>Adresse e-mail:
		<input type='email' name='mail'/></p>
	
		<input class="button" type="submit" name="submit" value="S'inscrire !"/>

</div>
<?php
}
include("includes/footer.php"); ?>