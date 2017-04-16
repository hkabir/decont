<h3><i class="glyphicon glyphicon-plus"></i> Adaugare tip decont</h3>

<?= $this->Form->create($type) ?>
	
	<div class="form-group">
		<?php echo $this->Form->control('name', ['label' => 'Tip decont', 'class' => 'form-control']); ?>
	</div>
		

<?= $this->Form->button('Gata') ?>
<?= $this->Form->end() ?>


