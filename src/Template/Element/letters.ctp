<h3 class="heading">Filtru Clienti</h3>

	<?php //echo $this->Html->link('all', '/clients/index/letter:', array('class' => empty($activeLetter) ? 'active' : '')); ?> 
	<?php //echo $this->Html->link('all', '/clients/index/letter:', array('class' => empty($activeLetter) ? 'active' : '')); ?> 
	<?php echo $this->Html->link('all', '/clients/index'); ?> 

	
	<?php foreach ($letters as $letter): ?>
	
		<?php echo $this->Html->link($letter, '/clients/index?letter='.$letter); ?> 
		
	<?php endforeach; ?>
					
	<div class="clearfix"> </div>