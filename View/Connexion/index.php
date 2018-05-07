<?php $this->title = "Mon blog - Connexion" ?>

<p>Vous devez être connecté pour accéder à cette zone.</p>
<form action="connexion/connect" method="post">
	<input type="text" name="login" placeholder="Entrez votre login" required autofocus>
	<input type="password" name="pwd" placeholder="Entrez votre mot de passe" required>
	<button type="submit">Connexion</button>
</form>
<?php if(isset($errorMsg)) echo '<p>'.$errorMsg.'</p>';