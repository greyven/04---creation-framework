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
					<table class="manageComments shadow">
						<tbody>
							<?php
								$lastPostId = 0;
								foreach ($postsWithReportedComments as $onePost)
								{
									if($this->clean($onePost['post_id']) == $lastPostId)
									{ }
									else
									{
										?>
										<tr>
											<td colspan="3">
												<div class="postTitle admin verticalAlignCenter">
													<a href="<?= "post/index/".$this->clean($onePost['post_id']) ?>">
														<h1 class="postLink"><?= $this->clean($onePost['post_title']) ?></h1>
													</a>
												</div>
											</td>
										</tr>
										<?php
										$lastPostId = $this->clean($onePost['post_id']);
									}
									?>
									<tr class="comment">
										<td class="comment author">
											<div class="marginComment hyphensAuto">
												<?= $this->clean($onePost['comm_author']); ?>
											</div>
										</td>
										<td class="comment">
											<?= $this->clean($onePost['comm_content']); ?>
										</td>
										<td class="comment">
											<div class="floatRight">
												<div class="commands">
													[
													<a href="post/deleteCommentFromAdmin/<?= $onePost['post_id'] ?>/<?= $onePost['comm_id'] ?>">
														Supprimer
													</a>
													] [
													<a href="managecomments/unreport/<?= $onePost['post_id'] ?>/<?= $onePost['comm_id'] ?>">
														Faux-signalement
													</a>
													]
												</div>
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