<?php include("includes/header.php"); 

if($_POST['prix'] != NULL ){
	$update='UPDATE jeux_video SET prix='.$_POST["prix"].' WHERE id_jeux_video='.$_POST["id"];
	$results = $db->exec($update);
	echo "<div class='row main'><p>Votre jeu est maintenant en vente a <strong>".$_POST["prix"]."</strong> euros.</p></div>";
}

if($_POST['nbr_joueur'] != NULL){
	$update='UPDATE jeux_video SET nbr_joueur='.$_POST["nbr_joueur"].' WHERE id_jeux_video='.$_POST["id"];
	$results = $db->exec($update);
	echo "<div class='row main'><p>Votre jeu a maintenant <strong>".$_POST["nbr_joueur"]."</strong> joueurs maximum.</p></div>";
}

if($_POST['commentaire_jeu'] != NULL){
	$update='UPDATE jeux_video SET commentaire_jeu="'.$_POST["commentaire_jeu"].'" WHERE id_jeux_video='.$_POST["id"];
	$results = $db->exec($update);
	echo "<div class='row main'><p>Votre jeu a maintenant pour commentaire : ' <strong>".$_POST["commentaire_jeu"]."</strong> ' .</p></div>";
}

if($_POST['commentaire_jeu'] == NULL AND $_POST['nbr_joueur'] == NULL AND $_POST['prix'] == NULL ){
	echo "<div class='row main'> Vous n'avez fait aucune modification sur le jeu ... </div>";
}

echo "<div class='row'><a href='gerer.php'>Retour</a></div><br />";

include("includes/footer.php"); ?>