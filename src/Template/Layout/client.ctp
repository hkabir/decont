<?php echo $this->element('header'); ?>


	<div class="col-md-9">
		<?= $this->fetch('content') ?>
	</div>

	<div class="col-md-3">			
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<?php echo $this->Html->link('Adaugare client', ['controller' => 'Clients', 'action' => 'add', '_full' => true], ['class' => 'btn btn-info'], ['confirm' => 'Doriti adaugare client?']); ?>
			</div>
		</div>

		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Alte informatii</h3>
				<p>Total clienti = 4</p>
			</div>
		</div>
   <!-- end letters -->
	   <div id="letters">
	   
			<?php echo $this->element('letters'); ?>

		</div>		
   </div>
   <!-- end letters -->

				
<?php echo $this->element('footer'); ?>