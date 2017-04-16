<?php
echo $this->Html->script(['prototype', 'invoice3'], ['block' => 'scriptTop']);
//echo $this->Html->css(array('jquery-ui'));
?>

<h1>Adaugare decont</h1>

<?= $this->Form->create($paper) ?>

	<?php echo $this->element('form_paper'); ?>
	
	<?= $this->Form->button('Gata',['id'=>'save']) ?>

<div class="clearfix"></div>
	 
 <div class="flash note" id="note">Factura trebuie sa fie atasata la un client, sa fie selectat furnizor, minim un cont bancar selectat si sa aiba valoare mai mare ca 0 inainte de salvare!</div> 
	
<?= $this->Form->end() ?>
