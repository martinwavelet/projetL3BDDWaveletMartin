<?php include("includes/header.php"); 

if(ISSET($_POST["id"])){
	$delete='DELETE FROM jeux_video WHERE id_jeux_video='.$_POST["id"];
	$results = $db->exec($delete);

	echo "<br/><div class='row'><h3>Le jeu a bien été supprimé.</h3></div>
		  <div class='row'><p><a href='gerer.php'>Retour</a></p></div>";
}
else{
	echo "<div class='row'><p> Vous n'avez pas de jeu a supprimer. <br />
	<a href='gerer.php'>Retour</a></p></div>";
}


include("includes/footer.php"); ?>