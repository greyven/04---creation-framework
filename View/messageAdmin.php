<div class="row">
	<div class="col-lg-12">
		<p class="admin marginLeft10">
			Ce blog comporte <?= $this->clean($postsNb); ?> billet<?php if($this->clean($postsNb) > 1) echo 's'; ?> et <?= $this->clean($commentsNb); ?> commentaire<?php if($this->clean($commentsNb) > 1) echo 's'; ?>.
		</p>
	</div>
</div>