<h3><i class="glyphicon glyphicon-plus"></i> Editare Client</h3>

<?= $this->Form->create($client) ?>

	<?php echo $this->element('form_client'); ?>
	
<?= $this->Form->button('Gata') ?>

<?= $this->Form->end() ?>