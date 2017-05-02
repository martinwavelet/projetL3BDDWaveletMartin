<?php include("includes/header.php"); ?>

<div class="row main">
<div class="row">
	<h2>Bienvenue sur "Vendre mes jeux vidéos" !</h2>
	<br />
	<p>Le principe du site est simple :
		<ul><li>Vous pouvez venir chercher et acheter les jeux qui vous intéressent !</li>
			<li>Une fois inscrit, vous pouvez mettre en vente et gérer vos propres jeux !</li>
		</ul>
	
	Voici les derniers jeux ajoutés à la base de données :
	</p>
</div>

<?php

$results = $db->query(
	'SELECT * FROM jeux_video ORDER BY id_jeux_video DESC LIMIT 5'
);

while ($row = $results->fetchArray()) {
	$nom_utilisateur = $db->querySingle("SELECT pseudo FROM utilisateur WHERE id_utilisateur=".$row[2]);
    if ($row[0]) {
        echo "<strong>".$row[1]."</strong> sur <strong>".$row[3]."</strong> mis en vente par <strong>".$nom_utilisateur."</strong> au prix de <strong>".$row[4]."</strong> euros.<br />";
    }
}

?>

<br/><br/><br/><br/>

</div>

<?php include("includes/footer.php"); ?>
