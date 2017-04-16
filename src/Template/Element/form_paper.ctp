<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('client_id', ['label' => 'Client', 'class' => 'form-control', 'options' => $clients]); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('user_id', ['options' => $users, 'label' => 'Utilizator', 'class' => 'form-control']); ?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('provider_id', ['label' => 'Furnizor', 'class' => 'form-control', 'options' => $providers]); ?>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('paperId', ['label' => 'Numar decont', 'class' => 'form-control', 'placeholder' => 'Numar decont','value'=>$lastPaperId+1]); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('purchaseOrder', ['label' => 'Numar comanda', 'class' => 'form-control', 'placeholder' => 'Numar comanda']); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('currency_id', ['label' => 'Moneda', 'class' => 'form-control', 'placeholder' => 'Moneda']); ?>
		</div>
	</div>

  <!-- Add the extra clearfix for only the required viewport -->
  <div class="clearfix visible-xs-block"></div>

</div>


<!-- corp decont -------------------------------------------------->
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"><?= __('Name') ?></th>
					<th scope="col"><?= __('Unit Id') ?></th>
					<th scope="col"><?= __('Qty') ?></th>
                                        <th scope="col"><?= __('Descriere') ?></th>
					<th scope="col"><?= __('Type Id') ?></th>
					<th scope="col">Vag/Tone Manevra</th>
					<th scope="col">Vag/Tone Transp</th>
                                        <th scope="col">Vag Transp</th>
					<th scope="col">Tone Transp</th>
					<th scope="col"><?= __('Km') ?></th>
					<th scope="col"><?= __('Unit Price') ?></th>
					<th scope="col"><?= __('Rate') ?></th>
					<th scope="col"><?= __('Total') ?></th>
				</tr>
			</thead>
			
			
			<?php //pr($paper);//
                         $param = $this->request->getParam('data.Item');
                        $items = isset($param)&& $param!=''? $param : $this->request->data['items'];  
                        //pr($param);
                        //$items = $this->request->data['Item'];
                        ?>
			
				<?php /*if(is_array($paper['items'])): ?>
					<?php //pr($this->request->data); ?>
					<?php foreach ($paper->items as $items): ?>

						<?php echo $this->element('form_paper_item', ['items' => $items]); ?>

					<?php endforeach; ?>			
					
				<?php endif; */?>		
                            
                            
                            <?php if(is_array($items)): ?>
		
		<?php $i = 0; ?>
		
		<?php foreach ($items as $item): ?>
			<?php echo $this->element('form_paper_item', array('item' => $item, 'id' => $i,'units'=>$units)); ?>

			<?php $i++; ?>
		<?php endforeach; ?>
		
		<?php endif; ?>
                       <tbody id="items_row"><!-- add rows with javascript --></tbody>     
			
		</table>


<?php
//pr($currencies);
$unitOptions = '';
foreach ($units as $key=>$val):
    $unitOptions .= '<option value=\"'.$key.'\" '.($key==6?'selected=\"selected\"':'').'>'.$val.'</option>';
endforeach;


$typeOptions = '';
//pr($types->toArray());
foreach ($types->toArray() as $key=>$val):
    $typeOptions .= '<option value=\"'.$key.'\">'.$val.'</option>';
endforeach;

$currencyOptions = '';
foreach ($currencies as $key=>$val):
    $currencyOptions .= '<option value=\"'.$key.'\" '.($key==2?'selected=\"selected\"':'').'>'.$val.'</option>';
endforeach;

?>
	<script language="javascript">
            
	 document.observe('dom:loaded', function() {
			In = new Invoice('<tr id=\"INDEX_ID\" class=\"item\"><td class=\"delete\"><a href=\"#\" onclick=\"In.remove_line_item(\'INDEX_ID\'); return false;\"><img src=\"<?php echo $this->request->webroot;?>img/delete.jpg\"></a> </td>\n\
                <td class=\"name\"><div class=\"input select\"><select name=\"items[INDEX_ID][unit_id]\" id=\"items-INDEX_ID-unit-id\"><?php echo $unitOptions;?></select></div>  </td>\n\
                <td class=\"qty\"><div class=\"input text\"><input name=\"items[INDEX_ID][qty]\" class=\"field size7\"  type=\"text\" onchange=\"In.refresh(); return false;\" size=\"2\" value=\"1\" maxlength=\"11\" id=\"items-INDEX_ID-qty\" /></div>  </td>\n\
                <td class=\"description\"><div class=\"input textarea\"><textarea name=\"items[INDEX_ID][description]\" class=\"field size7\" cols=\"25\" rows=\"1\" id=\"items-INDEX_ID-description\" ></textarea></div>  </td>\n\
                <td class=\"name\"><div class=\"input select\"><select name=\"items[INDEX_ID][type_id]\" class=\"field size7\"  id=\"items-INDEX_ID-type-id\"><?php echo $typeOptions;?></select></div>  </td>\n\
                <td class=\"vag_manevra\"><div class=\"input text\"><input name=\"items[INDEX_ID][vag_manevra]\" class=\"field size7\"  type=\"number\" onchange=\"In.refresh(); return false;\" size=\"2\" value=\"0\" maxlength=\"11\" id=\"items-INDEX_ID-vag-manevra\" /></div>  </td>\n\
                <td class=\"tone_manevra\"><div class=\"input text\"><input name=\"items[INDEX_ID][tone_manevra]\" class=\"field size7\"  type=\"number\" onchange=\"In.refresh(); return false;\" size=\"2\" value=\"0\" maxlength=\"11\" id=\"items-INDEX_ID-tone-manevra\" /></div>  </td>\n\
                <td class=\"vag_transp\"><div class=\"input text\"><input name=\"items[INDEX_ID][vag_transp]\" class=\"field size7\"  type=\"number\" onchange=\"In.refresh(); return false;\" size=\"2\" value=\"0\" maxlength=\"11\" id=\"items-INDEX_ID-vag-transp\" /></div>  </td>\n\
                <td class=\"tone_transp\"><div class=\"input text\"><input name=\"items[INDEX_ID][tone_transp]\" class=\"field size7\"  type=\"number\" onchange=\"In.refresh(); return false;\" size=\"2\" value=\"0\" maxlength=\"11\" id=\"items-INDEX_ID-tone-transp\" /></div>  </td>\n\
                <td class=\"km\"><div class=\"input text\"><input name=\"items[INDEX_ID][km]\" class=\"field size7\"  type=\"number\" onchange=\"In.refresh(); return false;\" size=\"2\" value=\"0\" maxlength=\"11\" id=\"items-INDEX_ID-km\" /></div>  </td>\n\
                <td class=\"price\"> <div class=\"input text\"><input name=\"items[INDEX_ID][price]\" type=\"text\" class=\"field size7\"  onchange=\"In.refresh(); return false;\" size=\"2\" value=\"0\" maxlength=\"11\" id=\"items-INDEX_ID-price\" /></div>  </td>\n\
               <td class=\"rate\"> <div class=\"input text\"><input name=\"items[INDEX_ID][rate]\" type=\"number\" class=\"field size7\"  onchange=\"In.refresh(); return false;\" size=\"2\" value=\"4.52\" maxlength=\"11\" id=\"items-INDEX_ID-rate\" /></div>  </td>\n\
               <td class=\"total\"><div id=\"items-INDEX_ID-total\">0.00</div></td>\n\
                </tr>	',  <?php echo count($items); ?> );
		}
	);
	</script>





<!--		<div id="new-item"  style="float: right;margin-right: 20px;"><?php echo $this->Html->link('add new line', '#', array('onclick' => 'In.add_line_item(); return false;','escape'=>false)); ?></div>-->
                
                <div id="new-item"  style="margin-right: 20px;"><?php echo $this->Html->link('add new line', '#', array('onclick' => 'In.add_line_item(); return false;','escape'=>false)); ?></div>
                
                
		<table class="total-table">
				<tr>
					<td colspan="8"></td>
					<td><b>Grand Total: </b></td>
                                        <td class="totals"><div id="grand_total"><?= $this->Number->format($paper->subTotal) ?></div></td>
				</tr>
<!--				<tr>
					<td colspan="8"></td>
					<td><b>TVA: </b></td>
                                        <td class="totals"><div id="tax"><?= $this->Number->format($paper->taxTotal) ?></div></td>
				</tr>
				<tr>
					<td colspan="8"></td>
					<td><b>Total General: </b></td>
                                        <td class="totals"><?= $this->Number->format($paper->total) ?></td>
				</tr>-->

		</table>

<!-- final corp decont -------------------------------------------------->

<div class="row">
	<div class="col-xs-12 col-sm-6">
			<div class="form-group">
				<?php echo $this->Form->control('date', ['label' => 'Data decont ', 'class' => 'form-control']); ?>
				<?php //echo $this->Form->control('date',['label' => 'Data executie']); ?>
			</div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('categories._ids', ['required'=>true,'options' => $categories, 'label' => 'Categorie', 'class' => 'form-control dateformat']); ?>
		</div>
	</div>
	
	<div class="col-sm-12">
		<div class="form-group">
			<?php echo $this->Form->control('notes1', ['label' => 'Note 1', 'class' => 'form-control']); ?>
			<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
		</div>

		<div class="form-group">
			<?php echo $this->Form->control('notes2', ['label' => 'Note 2', 'class' => 'form-control']); ?>
			<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
		</div>
	</div>

	

	<div class="col-xs-12 col-sm-6">
		<div class="form-group">
			<?php echo $this->Form->control('status_id', ['options' => $statuses, 'label' => 'Stare', 'class' => 'form-control']); ?>
		</div>
	</div>

  <!-- Add the extra clearfix for only the required viewport -->
  <div class="clearfix visible-xs-block"></div>

</div>


<?php
	//echo $this->Form->control('taxRate');
	//echo $this->Form->control('subTotal');
	//echo $this->Form->control('taxTotal');
	//echo $this->Form->control('total');
	echo $this->Form->control('delegat');
	echo $this->Form->control('identity_card');
?>