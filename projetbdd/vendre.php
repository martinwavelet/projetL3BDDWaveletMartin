<?php include("includes/header.php"); ?>

<?php 
if(ISSET($_SESSION["utilisateur"])){
	if(ISSET($_POST["nom"]) AND ISSET($_POST["console"]) AND ISSET($_POST["prix"]) AND ISSET($_POST["nbr_joueur"]) AND ISSET($_POST["commentaire_jeu"])){
	
		$insert="INSERT INTO jeux_video(nom, id_possesseur, console, prix, nbr_joueur, commentaire_jeu) VALUES('".
			$_POST['nom']."','".
			$_SESSION["utilisateur"]."','".
			$_POST['console']."','".
			$_POST['prix']."','".
			$_POST['nbr_joueur']."','".
			$_POST['commentaire_jeu']."')";

		$db->exec($insert);

		echo '<div class="row"><p>Votre jeu <strong>'.$_POST['nom'].'</strong> a bien été mis en vente au prix de <strong>'.$_POST['prix'].'</strong> euros. </p></div>';

	} 
	else{
?>

<div class="row main">
<div class="row"><h3>Mettre en vente un jeu :</h3></div>
<div class="row"><p>Tout les champs doivent être remplis !</p></div>

<form method="POST" action="vendre.php">
<div class="row">
	<div class="columns medium-6">
		<p>Nom du jeu vidéo:
		<input type='text' name='nom'/></p>

		<p>Console:
		<select name="console">
		<?php

		$results = $db->query(
		    'SELECT DISTINCT console FROM jeux_video ORDER BY console'
		);

		while ($row = $results->fetchArray()) {
		        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
		}
		?>
		</select>
		</p>

		<p>Commentaire associé au jeu:
		<textarea name='commentaire_jeu'></textarea></p>

	</div>

	<div class="columns medium-6">
		<p>Prix de vente
		<input type='number' name='prix'/></p>


		<p>Nombre de joueurs maximum:
		<select name="nbr_joueur">
			<option value="1"> 1 </option>
			<option value="2"> 2 </option>
			<option value="4"> 4 </option>
			<option value="8"> 8 </option>
			<option value="12"> 12 </option>
			<option value="16"> 16 </option>
		</select></p>

		<p><br/><input type="submit" name="New" value="Ajouter le jeu" class="button"/></p>
	</div>
</div>

</form>
</div>
<?php 
	}
}

else{
	echo '<div class="row"><p>Vous devez être connecté pour mettre un jeu en vente !<br/>'
?>
	<form action="connection.php" method="post">
	<input type='hidden' name='retourpage' value='vendre.php'>
	<input type="submit" class="button" value="Se connecter">
	</form>
	</div>
<?php
}

include("includes/footer.php"); ?>
