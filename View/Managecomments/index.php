<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';

		require_once('View/menuAdmin.php');
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

			<!-- GESTION DES COMMENTAIRES -->
			<div class="row">
				
				<!-- COMMENTAIRES SIGNALÉS -->
				<div class="col-lg-6">
					<?php
						foreach ($allPosts as $onePost)
						{
							?>
							<article class="post admin shadow">
								<header class="postTitle admin verticalAlignCenter">
									<a href="<?= "post/index/".$this->clean($onePost['post_id']) ?>">
										<h1 class="postLink"><?= $this->clean($onePost['post_title']) ?></h1>
									</a>
								</header>
								<div class="homeContent">
									<?php
										foreach ($reportedComments as $oneReportedComment)
										{
											if($oneReportedComment['comm_postid'] == $onePost['post_id'])
											{
												?>
												<p>
													<?= $this->clean($oneReportedComment['comm_content']); ?>
												</p>
												<?php
											}
										}
									?>
								</div>
							</article>
							<?php
						}
					?>
				</div>

				<!-- TOUS LES COMMENTAIRES -->
				<div class="col-lg-6">
					
				</div>
			</div>
		</div>
		
		<?php
	}
	else header("Location:home");
?>