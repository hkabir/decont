<h3><i class="glyphicon glyphicon-pencil"></i> Lista Furnizori</h3>

<?php foreach ($providers as $provider): ?>
	
	<?php echo $this->element('provider', ['provider' => $provider]); ?>
	
<?php endforeach; ?>

<?php echo $this->element('pagination'); ?>