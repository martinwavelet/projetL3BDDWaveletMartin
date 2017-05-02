<?php include("includes/header.php"); 

if(ISSET($_SESSION["utilisateur"])){

	echo "<div class='row main'><div class='row'><h3>Voici vos jeux actuellement en vente :</h3><br/>
		<p>Vous pouvez modifier le prix, le nombre de joueurs, le commentaire ou supprimer vos jeux.</p></div><br/>";

	$results = $db->query(
	'SELECT * FROM jeux_video WHERE id_possesseur='.$_SESSION["utilisateur"].' ORDER BY id_jeux_video DESC'
	);

	echo "<table><tr><th>Nom du jeu</th>
					<th>Console</th>
					<th>Prix</th>
					<th>Joueurs</th>
					<th>Commentaire</th>
					<th>Modifier</th>
					<th>Supprimer</th></tr>";	

	while ($row = $results->fetchArray()) {
  	  if ($row[0]) {
        echo "<form action='modifier.php' method ='post'>
        		  <tr><td>".$row[1]."</td>
        		  <td>".$row[3]."</td>
        		  <td><input type='number' name='prix' placeholder='".$row[4]." euros'></td>
        		  <td><input type='number' name='nbr_joueur' placeholder='".$row[5]."'></td>
        		  <td><input type='text' name='commentaire_jeu' placeholder='".$row[6]."'></td>
        		  <td><input type='hidden' name='id' value='".$row[0]."'><input type ='submit' class='button' value='Modifier'/></form></td>
        		  <td><form action='supprimer.php' method='post'><input type='hidden' name='id' value='".$row[0]."'><input type ='submit' class='button' value='Supprimer'/></form></td></tr>";
    }
	}
	echo '</table></div>';
}
else{
	echo '<div class="row"><p>Vous devez être connecté pour pouvoir gérez vos jeux !<br/>
		  <a href="connection.php"> Me connecter !</a></p></div><br/></div>';
}

include("includes/footer.php"); ?>