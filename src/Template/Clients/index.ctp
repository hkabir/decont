<h3><i class="glyphicon glyphicon-pencil"></i> Lista Clienti</h3>

<?php foreach ($clients as $client): ?>
	
	<?php echo $this->element('client', ['client' => $client]); ?>
	
<?php endforeach; ?>

<?php echo $this->element('pagination'); ?>