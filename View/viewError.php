<?php $titre = 'Mon blog'; ?>

<?php ob_start() ?>
	<p>Une erreur est survenue! <?= $errorMsg ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('View/template.php');