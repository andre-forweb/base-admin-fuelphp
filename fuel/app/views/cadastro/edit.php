<h2>Editing <span class='muted'>Cadastro</span></h2>
<br>

<?php echo render('cadastro/_form'); ?>
<p>
	<?php echo Html::anchor('cadastro/view/'.$cadastro->id, 'View'); ?> |
	<?php echo Html::anchor('cadastro', 'Back'); ?></p>
