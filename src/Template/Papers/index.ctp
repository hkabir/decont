<h3><i class="glyphicon glyphicon-pencil"></i> Toate deconturile</h3>
<h2>Decont nou</h2>

<?php 
//
//pr($papers);

?>

<?php foreach ($papers as $paper): ?>

	<?php echo $this->element('paper', ['paper' => $paper]); ?>
	
<?php endforeach; ?>

<?php echo $this->element('pagination'); ?>
