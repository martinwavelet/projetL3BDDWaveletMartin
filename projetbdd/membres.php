<?php include("includes/header.php"); ?>

<div class="row main">
<div class="row"><h3>La liste des membres du site :</h3></div>
<table>
<tr>
	<th> Pseudo </th>
	<th> Mail </th>
	<th> Note Moyenne</th>
</tr>

<?php

$results = $db->query(
	'SELECT * FROM utilisateur'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
    	$note_moyenne = $db->querySingle("SELECT AVG(note) FROM commentaires_utilisateur WHERE id_receveur=".$row[0]);
        echo "<tr>", "<td>", $row[1], "</td>",
		"<td>", $row[3], "</td>",
		"<td>", $note_moyenne, "</td>", "</tr>";
    }
}

?>

</table>
</div>
<?php include("includes/footer.php"); ?>
