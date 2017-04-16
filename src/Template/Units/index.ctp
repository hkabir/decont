<h3><i class="glyphicon glyphicon-pencil"></i> Lista unitati de masura</h3>

<table id="sort-table" class="table table-striped tablesorter">
	<thead>
		<tr>
			<th>ID</th>
			<th>Unitate de masura <i class="glyphicon glyphicon-chevron-down"></i></th>
			<th>Editare|Sterge <i class="glyphicon glyphicon-chevron-down"></i></th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($units as $unit): ?>
		<tr>
			<td><?= $this->Number->format($unit->id) ?></td>
			<td><?= h($unit->name) ?> </td>
			<td><?= $this->Html->link('Editare', ['action' => 'edit', $unit->id], ['class' => 'btn btn-primary']) ?> | <?= $this->Form->postLink('Sterge', ['action' => 'delete', $unit->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </td>

		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php echo $this->element('pagination'); ?>