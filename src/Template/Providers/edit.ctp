<h3><i class="glyphicon glyphicon-plus"></i> Editare Furnizor</h3>

<?= $this->Form->create($provider) ?>

	<?php echo $this->element('form_provider'); ?>
	
<?= $this->Form->button('Gata') ?>

<?= $this->Form->end() ?>