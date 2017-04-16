<?php echo $this->element('header'); ?>

	<div class="col-md-9">
		<?= $this->fetch('content') ?>
	</div>

	<div class="col-md-3">			
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<?php echo $this->Html->link('Tip decont nou', ['controller' => 'Types', 'action' => 'add', '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti adaugare tip decont?']); ?>
				<?php //echo $this->Html->link('Editare decont', ['controller' => 'Papers', 'action' => 'edit', 1, '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti editare decont?']); ?>
			</div>
		</div>


		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Tipuri decont</h3>
				<p>Tipuri de servicii pentru clienti</p>
			</div>
		</div>
	
	
	</div>
				
<?php echo $this->element('footer'); ?>