<?php echo $this->element('header'); ?>
			
	<div class="col-md-9">
	
		<?= $this->fetch('content') ?>
		
	</div>

	<div class="col-md-3">			

		<?php echo $this->element('stats'); ?>
		
	</div>
				
<?php echo $this->element('footer'); ?>

