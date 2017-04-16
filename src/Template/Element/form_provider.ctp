<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('name', ['label' => 'Nume furnizor', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('reg_comert', ['label' => 'Reg Comertului', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('cui', ['label' => 'Cod fiscal', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('cont_bancar', ['label' => 'Cont Bancar', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('banca', ['label' => 'Banca', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('user_id', ['options' => $users], ['label' => 'Utilizator', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('address', ['label' => 'Adresa', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('city', ['label' => 'Localitate', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('state', ['label' => 'Judet', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('zip', ['label' => 'Cod Postal', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('country', ['label' => 'Tara', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('url', ['label' => 'Adresa web', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('phone', ['label' => 'Telefon', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('fax', ['label' => 'Fax', 'class' => 'form-control']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('notes', ['label' => 'Observatii', 'class' => 'form-control']); ?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('capital_social', ['label' => 'capital_social', 'class' => 'form-control']); ?>
		</div>
	</div>

</div>