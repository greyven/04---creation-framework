<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';

		require_once('View/menuAdmin.php');
		?>
		
		<div class="container admin shadow">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="admin marginLeft10">Création de billet</h2>
				</div>	
			</div>
		</div>
		
		<?php
	}
	else header("Location:home");
?>