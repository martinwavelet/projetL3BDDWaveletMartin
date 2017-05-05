<?php include("includes/header.php");

if(!ISSET($_POST["id_utilisateur"])){
	echo ("Aucun membre à afficher<br/>");
}
else{
	$results = $db->query(
	'SELECT * FROM utilisateur WHERE id_utilisateur='.$_POST["id_utilisateur"]
	);

	while ($row = $results->fetchArray()) {
    	if ($row[0]) {
    		$id=$row[0];
      	    $nom=$row[1];
       	    $email=$row[3];
    	}
	}?>
<div class="row main">
<h3> Contacter <?=$nom?> :</h3>
<p>
<strong>E-mail :</strong> <?=$email?>. <br/>
<?php 
$note_moyenne = $db->querySingle("SELECT AVG(note) FROM commentaires_utilisateur WHERE id_receveur=".$id);
?>
<strong>Note moyenne</strong> : <strong><?=$note_moyenne?></strong>/5 <br/>
<?php 
if(ISSET($_SESSION["utilisateur"])){
?>
<form action="ajoutercommentaire.php" method="post">
<fieldset>
<legend><strong>Ajouter un commentaire :</strong></legend>
<label>Note :</label><input type="range" name="note" min="0" max="5"><br/>
<br/>
<label>Commentaire:</label><textarea name="commentaire">Ecrivez votre commentaire</textarea>
<input type='hidden' name='id_receveur' value=<?php echo "'".$id."'"; ?>>
<input type="submit" class="button" value=" Envoyer ">
</fieldset>
</form>
<br/>

<?php 
}
else{ ?>
	<form action="connection.php" method="post">
	<input type='hidden' name='retourpage' value='utilisateur.php'>
	<input type="submit" class="button" value="Connectez vous pour écrire un commentaire ">
	</form>
<?php } ?>

<strong>Les commentaires reçus par <?=$nom?> :</strong><br/>
<?php

$results = $db->query(
	'SELECT * FROM commentaires_utilisateur WHERE id_receveur="'.$id.'" ORDER BY id_commentaire DESC'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
    	$nom_auteur = $db->querySingle("SELECT pseudo FROM utilisateur WHERE id_utilisateur=".$row[2]);?>

<br/>
<div class="commentaire">
<legend>Commentaire de <strong><?=$nom_auteur?></strong> : </legend>
<p><strong> Note donné :</strong> <?=$row[5]?> <br/>
<strong>Commentaire :</strong> <?=$row[4]?> </p>
</div>

<?php
    }
}
?>

</p>
<br/>
</div>


<?php

}
include("includes/footer.php"); ?>