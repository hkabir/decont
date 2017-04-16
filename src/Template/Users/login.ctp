<h2 class="form-signin-heading text-center" >Intrare program deconturi</h2>

<?= $this->Flash->render('auth') ?>


<?php echo $this->Form->create('User', ['url' => ['action' => 'login'],'class' => 'form-signin']); ?>

	<fieldset>
		<legend><?php echo ('Introduceti email si parola'); ?></legend>
		<?php echo $this->Form->control('email', 
							[
								'type' => 'email', 
								'placeholder' => 'Introduceti adresa de email',
								'label' => 'Email',
								'class' => 'form-control'
							]
						); ?>
		<?php echo $this->Form->control('password', 
							[
							'class' => 'form-control', 
							'label' => 'Parola', 
							'placeholder' => 'Introduceti parola', 
							'type' => 'password', 
							'required' => true
							]
						); ?>
	</fieldset>
<?php echo $this->Form->button('Intrare', ['class' => 'btn btn-lg btn-primary btn-block']); ?>
<?php echo $this->Form->end(); ?>