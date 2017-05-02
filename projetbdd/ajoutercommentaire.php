<?php include("includes/header.php");

$insert= 'INSERT INTO commentaires_utilisateur(id_receveur,id_auteur,date_commentaire,commentaire,note) VALUES ("'
	.$_POST["id_receveur"].'","'
	.$_SESSION["utilisateur"].'","0","'
	.$_POST["commentaire"].'",'
	.$_POST["note"].')';

$db->exec($insert);

echo '<div class="row"><p>Votre jeu commentaire a bien été ajouté !<br/><br/>
	<a class="button" href="index.php"> Retour .</a> </p></div>';


include("includes/footer.php"); ?>