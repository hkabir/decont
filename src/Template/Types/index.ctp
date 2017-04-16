<h3><i class="glyphicon glyphicon-pencil"></i> Lista tipuri decont</h3>

<table id="sort-table" class="table table-striped tablesorter">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tip decont <i class="glyphicon glyphicon-chevron-down"></i></th>
			<th>Editare|Sterge <i class="glyphicon glyphicon-chevron-down"></i></th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($types as $type): ?>
		<tr>
			<?php echo $this->element('type', ['type' => $type]); ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php echo $this->element('pagination'); ?>
