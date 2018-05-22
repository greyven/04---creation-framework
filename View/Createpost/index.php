<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';
?>
		
		<div class="container admin shadow marginBottom10">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="admin marginLeft10">Création de billet</h2>
				</div>	
			</div>
		</div>

		<div class="container admin shadow">
			<div class="row">
				<div class="col-lg-12">
					<form name="createPost" id="createPost" action="index.html" method="post">
						<div class="row">
							<div class="col-lg-12">
								<textarea class="tiny" name="createPost" rows="27"></textarea>	
							</div>
						</div>
						<button type="submit">Valider</button>
					</form>
				</div>
			</div>
		</div>
		
		<?php
	}
	else header("Location:home");
?>