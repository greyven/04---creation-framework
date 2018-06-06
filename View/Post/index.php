<?php $this->title = 'Mon blog - '.$this->clean($post['post_title']); ?>

<article class="post shadow">

	<header class="postTitle verticalAlignCenter">
		<h2 class="postLink"><?= $this->clean($post['post_title']); ?></h2>
	</header>
	<p class="postContent"><?= $post['post_content']; ?></p>
	<footer class="postFooter verticalAlignCenter">
		<div class="postFooterText marginRight10">
			Jean Forteroche, le
			<time><?= $this->clean($post['post_date']); ?></time>
		</div>
	</footer>
</article>
<hr class="shadow" />
<div class="comments shadow">
	<div class="commentsContent">
		<div class="row">
			<div class="col-xs-12">
				<header class="commHeader">
					<h1 id="responsesTitle">Réponses à <?= $this->clean($post['post_title']); ?></h1>
				</header>	
			</div>
			<div class="col-xs-12">
				<div class="commBody">
					<?php
						foreach ($comments as $oneComment)
						{
							?>
							<div class="comment">
								<div class="container">
									<div class="row">
										<div class="col-sm-8 col-xs-12">
											<div class="commAuthor">
												<div class="floatLeft">
													<?= '<em><h6>Le '.$this->clean($oneComment['comm_date']).'</h6></em>'; ?>
												</div>
												<div class="floatLeft"> - </div>
												<div class="floatLeft">
													<strong><?= $this->clean($oneComment['comm_author']); ?> dit: </strong><br/>
												</div>
											</div>
										</div>
										<?php
											if(isset($_SESSION['user_id']))
											{
												?>
												<div class="col-sm-4 col-xs-12 commReport">
													<?php
														if($this->clean($oneComment['comm_reported']))
														{
															?>
															<div class="floatRight inline">
																<span class="reported">Déjà signalé</span>
															</div>
															<?php
														}
														else
														{
															?>
															<div class="floatRight inline">
																<a href="post/report/<?= $oneComment['comm_id'] ?>">
																	<span class="notReported">Signaler</span>
																</a>
															</div>
															<?php
														}

														if(isset($_SESSION['admin']) && $_SESSION['admin'])
														{
															?>
															<div class="floatRight"> - </div>
															<div class="floatRight inline">
																<a href="post/deleteComment/<?= $oneComment['comm_id'] ?>">
																	<span class="deleteComment">Supprimer</span>
																</a>
															</div>
															<?php
														}
													?>
												</div>
												<?php
											}
										?>
									</div>
									<div class="row">
										<div class="col-xs-12 commContent hyphensAuto">
											<?= $this->clean($oneComment['comm_content']); ?>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="commFooter">
					<form method="post" action="post/toComment/">
						<input id="author" name="comm_author" type="text"
							<?php
								if(isset($_SESSION['user_login'])) echo 'value="'.$_SESSION['user_login'].'" readonly';
								else echo 'placeholder="Votre pseudo" required';
							?>
						/>
						<br/>
						<textarea id="txtComment" name="comm_content" rows="6" placeholder="Votre commentaire" minlength="5" maxlength="200" required></textarea>
						<br/>
						<input type="hidden" name="id" value="<?= $post['post_id'] ?>"/>
						<input type="submit" value="Valider"/>
					</form>
					<?php
						if(isset($_SESSION['errorMsg']))
						{
							?>
							<div class="row">
								<div class="col-xs-12">
									<?= '<p>'.$_SESSION['errorMsg'].'</p>'; ?>
								</div>
							</div>
							<?php
						}
					?>
				</div>
			</div>
		</div>	
	</div>
</div>