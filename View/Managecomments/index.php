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
						<h2 class="admin marginLeft10">Gestion des commentaires</h2>
					</div>	
				</div>
				<?php require_once('View/messageAdmin.php'); ?>
			</div>
			<br/>

			<!-- GESTION DES COMMENTAIRES -->
			<div class="row">
				
				<!-- COMMENTAIRES SIGNALÉS -->
				<div class="col-lg-12">
					<table class="manageComments">
						<tbody>
							<?php
								foreach ($postsWithReportedComments as $onePost)
								{
									?>
									<tr>
										<td>
											<div class="postTitle admin verticalAlignCenter">
												<a href="<?= "post/index/".$this->clean($onePost['post_id']) ?>">
													<h1 class="postLink"><?= $this->clean($onePost['post_title']) ?></h1>
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="homeContent">
												<pre>
													<?php var_dump($onePost); ?>
												</pre>
											</div>
										</td>
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