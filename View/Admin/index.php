<?php $this->title = 'Mon blog - Administration'; ?>

<h2>Administration</h2>

Bienvenue, <?= $this->clean($login); ?>!
Ce blog comporte <?= $this->clean($postsNb); ?> post<?php if($this->clean($postsNb) > 1) echo 's'; ?> et <?= $this->clean($commentsNb); ?> commentaire<?php if($this->clean($commentsNb) > 1) echo 's'; ?>.

<a id="decoLink" href="connexion/deconnect">Se déconnecter</a>