<?php echo $this->element('header'); ?>

	<div class="col-md-9">
		<?= $this->fetch('content') ?>
	</div>

	<div class="col-md-3">			
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<?php echo $this->Html->link('Adaugare furnizor', ['controller' => 'Providers', 'action' => 'add', '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti adaugare furnizor?']); ?>
			</div>
		</div>

		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Alte informatii despre furnizori</h3>
				<p>Total furnizori = 4</p>
			</div>
		</div>
		
   </div>


				
<?php echo $this->element('footer'); ?>