<?php $this->title = "Mon blog - Inscription" ?>

<div class="container">
	<div class="row connexion padding10">
		<div class="col-lg-12">
			<p>Entrez votre login et Mot de passe pour vous inscrire.</p>
		</div>
		<div class="col-lg-12">
			<form action="register/subscribe" method="post">
				<input type="text" name="user_login" placeholder="Entrez votre login" required autofocus>
				<input type="password" name="user_pwd" placeholder="Entrez votre mot de passe" required>
				<button type="submit">Inscription</button>
			</form>	
		</div>
		<?php
			if(isset($errorMsg))
			{
				?>
				<div class="col-lg-12">
					<?= '<p>'.$errorMsg.'</p>'; ?>
				</div>
				<?php
			}
		?>
	</div>
</div>