<?php echo $this->element('header'); ?>

	<div class="col-md-9">
		<?= $this->fetch('content') ?>
	</div>

	<div class="col-md-3">			
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<ul>
					<li><?php echo $this->Html->link('Editare', ['controller' => 'Papers', 'action' => 'edit', $paper->id, '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti editare decont?']); ?></li>
					<li><?php echo $this->Html->link('PDF', ['controller' => 'Papers', 'action' => 'send', $paper->id, '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti pdf decont?']); ?></li>				
					<li><?php echo $this->Html->link('Duplicat', ['controller' => 'Papers', 'action' => 'duplicate', $paper->id, '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti duplicat decont?']); ?></li>				
					<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paper->id], ['class' => 'btn btn-info','confirm' => __('Are you sure you want to delete # {0}?', $paper->id)]); ?></li>				
				</ul>
				<?php //echo $this->Html->link('PDF', ['controller' => 'Papers', 'action' => 'pdf', $paper->id, '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti editare decont?']); ?>
				<?php //echo $this->Html->link('Editare decont', ['controller' => 'Papers', 'action' => 'edit', 1, '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti editare decont?']); ?>
			</div>
		</div>

		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Total deconturi</h3>
				<p>Total = 677657.23 Lei</p>
				<p>Numar deconturi = 338</p>
				<p>De incasat = 100424.42 Lei</p>
			</div>
		</div>
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Total deconturi pe categorii</h3>
				<p>Transport marfa = 677657.23 Lei</p>
				<p>Manevra = 338</p>
				<p>Altele = 100424.42 Lei</p>
			</div>
		</div>
		
	
	</div>
				
<?php echo $this->element('footer'); ?>