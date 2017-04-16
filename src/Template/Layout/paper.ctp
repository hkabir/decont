<?php echo $this->element('header'); ?>

	<div class="col-md-9">
		<?= $this->fetch('content') ?>
	</div>

	<div class="col-md-3">			
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<?php echo $this->Html->link('Decont nou', ['controller' => 'Papers', 'action' => 'add', '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti editare decont?']); ?>
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
		
		<div class="box">
			<?php echo $this->element('refine_papers'); ?>
		</div>	
	
	</div>
				
<?php echo $this->element('footer'); ?>