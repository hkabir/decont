<?php echo $this->element('header'); ?>

	<div class="col-md-9">
		<?= $this->fetch('content') ?>
	</div>

	<div class="col-md-3">	

		<div class="panel panel-default clearfix">
			<div class="panel-header">					

				<?php echo $this->Html->link('Client nou', ['controller' => 'Clients', 'action' => 'add', '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti adaugare client nou?']); ?>
			
			</div>	
			<div class="panel-footer clearfix">
				alte info: cum se adauga un client, obligatoriu cod fiscal, j. etccc
			</div>			
			<div class="panel-footer clearfix">
				<div class="pull-left">
					<h3>Total clienti</h3>
					<p>Total = 14</p>
				</div>
			</div>
			

		</div>
<i class="glyphicon glyphicon-print"></i> Informatii 

		
	</div>
				
<?php echo $this->element('footer'); ?>