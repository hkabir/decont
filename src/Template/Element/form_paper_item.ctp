<tr id="<?php echo $id; ?>" class="item">
	<td class="delete">
		<?php echo $this->Html->link('<img src="'.$this->request->webroot.'img/delete.jpg">', '#', array('onclick' => "In.remove_line_item('$id'); return false;",'escape'=>FALSE), false, false); ?> 
	</td>
	<td class="name">
	<?php 
		if($item['id'])
		echo $this->Form->control("items.$id.id", array('value' => $item['id']));
		echo $this->Form->control("items.$id.unit_id", array('label' => false, 'value' => isset($item['unit_id']) ? $item['unit_id'] : 1,'options'=>$units)); ?>
	</td>
	<td class="qty">
	<?php echo $this->Form->control("items.$id.qty", array('onchange' =>  'In.refresh(); return false;', 'label' => false, 'value' => isset($item['qty']) ? $item['qty'] : '1', 'class' => 'field size7')); ?>
	</td>
	<td class="description">
	<?php echo $this->Form->control("items.$id.description", array('label' => false, 'rows' => 1, 'value' => isset($item['description']) ? $item['description'] : '', 'class' => 'field size7' )); ?>
	</td>
        <td class="type">
	<?php echo $this->Form->control("items.$id.type_id", array('label' => false, 'value' => isset($item['type_id']) ? $item['type_id'] : '', 'class' => 'field size7' )); ?>
	</td>
	<td class="vag_manevra"> 
	<?php 
	   echo $this->Form->control("items.$id.vag_manevra", array( 'label' => false, 'class' => 'field size7', 'value' => isset($item['vag_manevra']) ? $item['vag_manevra'] : '0'));     
	?>
	</td>
        
        <td class="tone_manevra"> 
	<?php 
	   echo $this->Form->control("items.$id.tone_manevra", array( 'label' => false, 'class' => 'field size7', 'value' => isset($item['tone_manevra']) ? $item['tone_manevra'] : '0'));     
	?>
	</td>
        <td class="vag_transp"> 
	<?php 
	   echo $this->Form->control("items.$id.vag_transp", array( 'label' => false, 'class' => 'field size7', 'value' => isset($item['vag_transp']) ? $item['vag_transp'] : '0'));     
	?>
	</td>

        <td class="tone_transp"> 
	<?php 
	   echo $this->Form->control("items.$id.tone_transp", array( 'label' => false, 'class' => 'field size7', 'value' => isset($item['tone_transp']) ? $item['tone_transp'] : '0'));     
	?>
	</td>
        
        
        <td class="km"> 
	<?php echo $this->Form->control("items.$id.km", array('onchange' => 'In.refresh(); return false;', 'label' => false, 'class' => 'field size7', 'value' => isset($item['km']) ? $item['km'] : '0'));     
	?>
	</td>
	<td class="price"> 
	<?php echo $this->Form->control("items.$id.price", array('onchange' =>  'In.refresh(); return false;', 'label' => false, 'size' => 7, 'value' => isset($item['price']) ? $item['price'] : '0.00', 'class' => 'field size7')); ?>
	</td>

         <td class="currency"> 
	<?php echo $this->Form->input("items.$id.rate", array('onchange' =>  'In.refresh(); return false;', 'label' => false, 'class' => 'field size7', 'value' => isset($item['rate']) ? $item['rate'] : 4.52)); ?>
  </td>
	<td class="total"><div id="items-<?php echo $id; ?>-total"><?php echo isset($item['total']) ? $item['total'] : $item['qty'] * $item['price']; ?></div>
	</td>
</tr>	