<h2>Cautare deconturi</h2>
<?php //pr($this->request->data); ?>
<?php //echo $this->Form->create('Papers',  ['type' => 'get', 'action' => 'index']); ?>

   <?php 
      echo $this->Form->create('Papers', array(
          'url'   => array(
               'controller' => 'Papers','action' => 'index'
           ), 
          'id'    => 'web-form', 
          'class' =>'panel-body wrapper-lg'
       )
    ); ?>


<div class="form-group">	
	<?php echo $this->Form->control('paperId', array('label' => 'Numar decont', 'size' => '5')); ?>
</div>

<!--
<div class="form-group">
	<?php //echo $this->Form->control('date', ['label' => 'Data', 'class' => 'form-control']); ?>
</div>
-->


<div class="form-group">
	<?php echo $this->Form->label('Papers.date', 'De la data:'); ?> <br/>
	<?php echo $this->Form->day('day_start', ['empty' => '--']); 	?>
	<?php echo $this->Form->month('month_start', ['empty' => '--']); 	?>
	<?php echo $this->Form->year('year_start', [
			'minYear' => 2016,
			'maxYear' => date('Y')+2,
			'empty' => '--'
			]); 
	?>
</div>

<div class="form-group">
	<?php echo $this->Form->label('Papers.date', 'Pina la data:'); ?> <br/>
	<?php echo $this->Form->day('day_stop', ['empty' => '--']); 	?>
	<?php echo $this->Form->month('month_stop', ['empty' => '--']); 	?>
	<?php echo $this->Form->year('year_stop', [
			'minYear' => 2016,
			'maxYear' => date('Y')+2,
			'empty' => '--'
			]); 
	?>
</div>



<!-- <div class="form-group">
	<?php //echo $this->Form->control('date', ['label' => 'Data decont ', 'class' => 'form-control']); ?>
	<?php //echo $this->Form->control('date',['label' => 'Data executie']); ?>
	<?php //echo $this->Form->input('date',array('dateFormat' => 'YDM','maxYear'=>date('Y'),'minYear'=>'1901','empty'=>'--Select--','label'=>'Select Birth Date')); ?>
	<?php //echo $this->Form->input('date', ['class' => 'datepicker-input', 'type' => 'text', 'format' => 'Y-m-d', 'default' => date('Y-m-d'), 'value' => !empty($item->date) ? $item->date->format('Y-m-d') : date('Y-m-d')]); ?>
	<?php //echo $this->Form->input('dob',['label'=>'Date of Birth']); ?>
</div>

-->
<div class="form-group">
	<?php echo $this->Form->control('client_id', ['label' => 'Client', 'class' => 'form-control','selected' => isset($this->request->data['client_id']) ? $this->request->data['client_id'] : '', 'empty' => '--', 'options' => $clients]); ?>
</div>

<div class="form-group">
	<?php echo $this->Form->control('status_id', ['label' => 'Stare', 'class' => 'form-control','selected' => isset($this->request->data['status_id']) ? $this->request->data['status_id'] : '','empty' => '--', 'options' => $statuses]); ?>
</div>

<div class="form-group">
	<?php echo $this->Form->control('user_id', ['label' => 'Utilizator', 'class' => 'form-control','empty' => '--', 'options' => $users]); ?>
</div>

<div class="form-group">
	<?php echo $this->Form->control('notes1', ['label' => 'Note 1', 'class' => 'form-control']); ?>
</div>

<div class="form-group">
	<?= $this->Form->button('Cautare') ?>
</div>

	
<?= $this->Form->end() ?>