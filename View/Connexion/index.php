<?php $this->title = "Mon blog - Connexion" ?>

<div class="container">
	<div class="row connexion padding10">
		<div class="col-lg-8">
			<h2 class="loginPwdTitle">Connexion</h2>
		</div>
		<div class="col-lg-8">
			<p class="white">Entrez votre login et Mot de passe pour vous connecter.</p>
		</div>
		<div class="col-lg-8">
			<form action="connexion/connect" method="post">
				<input type="text" name="user_login" placeholder="Entrez votre login" required autofocus>
				<input type="password" name="user_pwd" placeholder="Entrez votre mot de passe" required>
				<button type="submit">Connexion</button>
			</form>	
		</div>
		<?php
			if(isset($errorMsg))
			{
				?>
				<div class="col-lg-8">
					<?= '<p>'.$errorMsg.'</p>'; ?>
				</div>
				<?php
			}
		?>
	</div>
</div>