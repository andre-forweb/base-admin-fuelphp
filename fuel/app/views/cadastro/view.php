<h2>Viewing <span class='muted'>#<?php echo $cadastro->id; ?></span></h2>

<p>
	<strong>Nome:</strong>
	<?php echo $cadastro->nome; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $cadastro->email; ?></p>
<p>
	<strong>Tel:</strong>
	<?php echo $cadastro->tel; ?></p>
	<img src="" alt="">

	
	
	
<?php echo Html::anchor('cadastro/edit/'.$cadastro->id, 'Edit'); ?> |
<?php echo Html::anchor('cadastro', 'Back'); ?>