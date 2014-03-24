<h2>Editing Admin_cadastro</h2>
<br>

<?php echo render('admin/admin/cadastro/_form'); ?>
<p>
	<?php echo Html::anchor('admin/admin/cadastro/view/'.$admin_cadastro->id, 'View'); ?> |
	<?php echo Html::anchor('admin/admin/cadastro', 'Back'); ?></p>
