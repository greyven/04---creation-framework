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
					<form name="createPost" action="createpost/addPost" method="post">
						<div class="row">
							<div class="col-lg-12">
								<div class="horizontalAlignCenter">
									<input type="text" name="createPostTitle" class="marginTop10 marginBottom10" placeholder="Titre du billet" size="55" maxlength="50" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<textarea class="tiny" name="createPostContent" rows="27" required></textarea>	
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="horizontalAlignCenter">
									<button type="submit" class="createPostBttn marginTop10 marginBottom10">Valider</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php
	}
	else header("Location:home");
?>