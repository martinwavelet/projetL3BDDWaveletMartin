<?php include("includes/header.php"); ?>

<div class="row"><h3>Résultats de votre recherche :</h3></div><br/>
<div class="row main">
<?php 
if(!ISSET($_POST["nom"]) AND !ISSET($_POST["console"]) AND !ISSET($_POST["nbr_joueur"]) ){
	/* Si il n'y a pas de recherche on affiche toute la table*/
	$results = $db->query('SELECT * FROM jeux_video');
	echo "<table><tr><th>Nom du jeu</th>
					<th>Vendeur</th>
					<th>Console</th>
					<th>Prix</th>
					<th>Joueurs</th>
					<th>Commentaire</th>
					<th>Achat</th>
					</tr>";
	while ($row = $results->fetchArray()) {
		$nom_utilisateur = $db->querySingle("SELECT pseudo FROM utilisateur WHERE id_utilisateur=".$row[2]);
		if ($row[0]) {
        echo "<tr><td>".$row[1]."</td>
        		  <td>".$nom_utilisateur."</td>
        		  <td>".$row[3]."</td>
        		  <td>".$row[4]." euros</td>
        		  <td>".$row[5]."</td>
        		  <td>".$row[6]."</td>
        		  <td><form action='utilisateur.php' method='post'><input type='hidden' name='id_utilisateur' value='".$row[2]."'><input type='submit' class='button' value='Contacter ".$nom_utilisateur."'/></form></td></tr>";
    	}
	}
	echo "</table>";
}
else{
	if($_POST["console"]=='tous'){
		$query="SELECT * FROM jeux_video WHERE nbr_joueur >=".$_POST["nbr_joueur"]."";
	}
	else {
		$query="SELECT * FROM jeux_video WHERE console='".$_POST["console"]."' AND nbr_joueur >=".$_POST["nbr_joueur"]."";
	}
	if(strlen($_POST["nom"])>0){
		$query = $query." AND nom LIKE '%".$_POST["nom"]."%'";
	}
	
	$results=$db->query($query);


	echo "<table><tr><th>Nom du jeu</th>
					<th>Posesseur</th>
					<th>Console</th>
					<th>Prix</th>
					<th>Joueurs</th>
					<th>Commentaire</th>
					<th>Achat</th></tr>";

	while ($row = $results->fetchArray()) {
		if ($row[0]) {
		$nom_utilisateur = $db->querySingle("SELECT pseudo FROM utilisateur WHERE id_utilisateur=".$row[2]);
        echo "<tr><td>".$row[1]."</td>
        		  <td>".$nom_utilisateur."</td>
        		  <td>".$row[3]."</td>
        		  <td>".$row[4]." euros</td>
        		  <td>".$row[5]."</td>
        		  <td>".$row[6]."</td>
        		  <td><form action='utilisateur.php' method='post'><input type='hidden' name='id_utilisateur' value='".$row[2]."'><input type='submit' class='button' value='Contacter ".$nom_utilisateur."'/></form></td></tr>";
				}
			}
}
echo "</table></div><br/>";

include("includes/footer.php"); ?>