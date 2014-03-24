<h2>Listing Admin_cadastros</h2>
<br>
<?php if ($admin_cadastros): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Abstract</th>
			<th>Full text</th>
			<th>Project id</th>
			<th>Is draft</th>
			<th>Order</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($admin_cadastros as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->abstract; ?></td>
			<td><?php echo $item->full_text; ?></td>
			<td><?php echo $item->project_id; ?></td>
			<td><?php echo $item->is_draft; ?></td>
			<td><?php echo $item->order; ?></td>
			<td>
				<?php echo Html::anchor('admin/admin/cadastro/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/admin/cadastro/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/admin/cadastro/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Admin_cadastros.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/admin/cadastro/create', 'Add new Admin cadastro', array('class' => 'btn btn-success')); ?>

</p>
