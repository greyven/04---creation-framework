<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';
?>
		
		<div class="container">
			
			<!-- MESSAGE -->
			<div class="container admin shadow">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="admin marginLeft10">Gestion des billets</h2>
					</div>	
				</div>
				<?php require_once('View/messageAdmin.php'); ?>
			</div>
			<br/>

			<!-- AFFICHAGE DES BILLETS -->
			<div class="row">
				<div class="col-lg-12">
					<table class="manageComments shadow">
						<tbody>
							<?php
								foreach ($allPosts as $onePost)
								{
									?>
									<tr>
										<td>
											<div class="postTitle admin verticalAlignCenter">
												<div class="row">
													<div class="col-lg-8">
														<a href="<?= "post/index/".$this->clean($onePost['post_id']) ?>">
															<h2 class="postLink"><?= $this->clean($onePost['post_title']) ?></h2>
														</a>
													</div>
													<div class="col-lg-4">
														<div class="white floatRight marginRight10">
															[
															<a class="white" href="<?= "modifypost/index/".$this->clean($onePost['post_id']) ?>">
																Modifier
															</a>
															]
														</div>
														<div class="white floatRight marginRight10">
															[
															<a class="white" href="<?= "admin/deletePost/".$this->clean($onePost['post_id']) ?>">
																Supprimer
															</a>
															]
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr class="space">
										<td></td>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<?php
	}
	else header("Location:home");
?>