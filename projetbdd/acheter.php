<?php include("includes/header.php"); ?>
<div class="row"><h3>Chercher un jeu vidéo :</h3></div>

<form action="recherche.php" method="POST">
<div class="row">
	<div class="columns medium-6">
		<p>Nom du jeu vidéo:
		<input type='text' name='nom'/></p>

		<p>Console*:
		<select name="console">
		<option value="tous">Peu importe</option>
		<?php

		$results = $db->query(
		    'SELECT DISTINCT console FROM jeux_video ORDER BY console'
		);

		while ($row = $results->fetchArray()) {
		        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		}
		?>
		</select>
		</p>
	</div>

	<div class="columns medium-6">

		<p>Nombre de joueurs minimum*:
		<select name="nbr_joueur">
			<option value="1"> Peu importe </option>
			<option value="1"> 1 </option>
			<option value="2"> 2 </option>
			<option value="4"> 4 </option>
			<option value="8"> 8 </option>
			<option value="12"> 12 </option>
			<option value="16"> 16 </option>
		</select></p>
		
	</div>
	</div>
	<div class="row">
	<input type="submit" name="New" value="Chercher !" class="button"/>
	<a class="button" href="recherche.php">Voir tout les jeux !</a>

	<p>Les champs marqués par une * doivent être remplis</p>
	</div>
</form>

<?php include("includes/footer.php"); ?>