<br/>
<div class="row">
	<div class="small-2 large-4 columns">
		<form method="POST" action="connection.php">
			<fieldset><legend>Pseudo : </legend><input type="text" name="pseudo" placeholder="Entrez votre pseudo" /></fieldset>
			<fieldset><legend>Mot de passe : </legend><input type="password" name="mdp" placeholder="Entrez votre mot de passe" /></fieldset>
			<?php 
			if(ISSET($_POST["retourpage"])){
				echo "<input type='hidden' name='retourpage' value='".$_POST['retourpage']."'>";}
			?>
			<input class="button" type="submit" name="submit" value="Se connecter"/>
		</form>
	</div>
</div>
<br/>