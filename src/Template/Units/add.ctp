<h3><i class="glyphicon glyphicon-plus"></i> Adaugare unitate de masura</h3>

<?= $this->Form->create($unit) ?>
	
	<div class="form-group">
		<?php echo $this->Form->control('name', ['label' => 'Unitate de masura', 'class' => 'form-control']); ?>
	</div>
		

<?= $this->Form->button('Gata') ?>
<?= $this->Form->end() ?>