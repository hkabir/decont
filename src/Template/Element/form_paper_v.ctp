	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<?php echo $this->Form->control('client_id', ['label' => 'Client', 'class' => 'form-control', 'options' => $clients]); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->control('date', ['label' => 'Data decont', 'class' => 'form-control']); ?>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<?php echo $this->Form->control('provider_id', ['label' => 'Furnizor', 'class' => 'form-control', 'options' => $providers]); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->control('paperId', ['label' => 'Numar decont', 'class' => 'form-control', 'placeholder' => 'Numar decont']); ?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<?php echo $this->Form->control('purchaseOrder', ['label' => 'Numar comanda', 'class' => 'form-control', 'placeholder' => 'Numar comanda']); ?>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<?php echo $this->Form->control('currency_id', ['label' => 'Moneda', 'class' => 'form-control', 'placeholder' => 'Moneda']); ?>
			</div>
		</div>
	</div>	
	
	<!-- corp decont -------------------------------------------------->

	
	<!-- final corp decont -------------------------------------------------->


	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<?php echo $this->Form->control('date', ['label' => 'Data executie', 'class' => 'form-control']); ?>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<?php echo $this->Form->control('categories._ids', ['options' => $categories, 'label' => 'Categorie', 'class' => 'form-control']); ?>
			</div>
		</div>
	</div>

			
	<div class="row">
		<div class="col-xs-8">
			<div class="form-group">
				<?php echo $this->Form->control('notes1', ['label' => 'Note 1', 'class' => 'form-control']); ?>
				<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			</div>
			<div class="form-group">
				<?php echo $this->Form->control('notes2', ['label' => 'Note 2', 'class' => 'form-control']); ?>
				<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			</div>
		</div>
	</div>
<?php

	echo $this->Form->control('user_id', ['options' => $users]);
	echo $this->Form->control('status_id', ['options' => $statuses]);
	echo $this->Form->control('taxRate');
	echo $this->Form->control('subTotal');
	echo $this->Form->control('taxTotal');
	echo $this->Form->control('total');
	echo $this->Form->control('delegat');
	echo $this->Form->control('identity_card');

?>