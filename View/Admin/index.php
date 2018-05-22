<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';
?>
		<div class="container admin shadow">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="admin marginLeft10">Gestion des billets</h2>
				</div>	
			</div>
			<?php require_once('View/messageAdmin.php'); ?>
		</div>
		<?php
	}
	else header("Location:home");
?>