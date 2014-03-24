<h2>Listing <span class='muted'>Cadastros</span></h2>
<br>
<?php if ($cadastros): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Tel</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cadastros as $item): ?>		<tr>

			<td><?php echo $item->nome; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->tel; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('cadastro/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('cadastro/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('cadastro/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cadastros.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('cadastro/create', 'Add new Cadastro', array('class' => 'btn btn-success')); ?>

</p>
