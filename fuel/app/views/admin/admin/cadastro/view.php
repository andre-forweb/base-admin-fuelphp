<h2>Viewing #<?php echo $admin_cadastro->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $admin_cadastro->title; ?></p>
<p>
	<strong>Abstract:</strong>
	<?php echo $admin_cadastro->abstract; ?></p>
<p>
	<strong>Full text:</strong>
	<?php echo $admin_cadastro->full_text; ?></p>
<p>
	<strong>Project id:</strong>
	<?php echo $admin_cadastro->project_id; ?></p>
<p>
	<strong>Is draft:</strong>
	<?php echo $admin_cadastro->is_draft; ?></p>
<p>
	<strong>Order:</strong>
	<?php echo $admin_cadastro->order; ?></p>

<?php echo Html::anchor('admin/admin/cadastro/edit/'.$admin_cadastro->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/admin/cadastro', 'Back'); ?>