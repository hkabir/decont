<h1><i class="glyphicon glyphicon-plus"></i> Adaugare decont</h1>
<?= $this->Form->create($paper) ?>
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



	<div class="row">
		<div class="col-xs-8">
			<div style="float: right;margin-right: 20px;"><a href="#" onclick="In.add_line_item(); return false;"><img src="img/plus.jpg"></a></div>

			<table class="table total-table" align="right">
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>Sub total</strong>
				</td>
				<td class="totals">
					  <div id="subtotal">15354.74</div>
				</td>
			</tr>
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>TVA</strong>
				</td>
				<td class="totals">
					<div id="tax">2917.40</div>
				</td>
			</tr>  
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>Total</strong>
				</td>
				<td class="totals">
					<div id="total">18272.14</div>
				</td>
			</tr>
			</table>
		</div>
	</div>
	
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


				<?= $this->Form->button(__('Submit')) ?>
				<?= $this->Form->end() ?>
					



					
					
					
					////
					
					
					
					

	
<?php
	echo $this->Form->control('user_id', ['options' => $users]);
	echo $this->Form->control('status_id', ['options' => $statuses]);
	echo $this->Form->control('taxRate');
	echo $this->Form->control('subTotal');
	echo $this->Form->control('taxTotal');
	echo $this->Form->control('total');
	echo $this->Form->control('delegat');
	echo $this->Form->control('identity_card');
	echo $this->Form->control('notes1');
	echo $this->Form->control('notes2');
	echo $this->Form->control('categories._ids', ['options' => $categories]);
?>



<form action="#">
	<h1><i class="glyphicon glyphicon-plus"></i> Adaugare decont</h1>
	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<label for="client">Client</label>
				<select class="form-control" id="client">
					<option>Transferoviar Grup SRL</option>
					<option>Lorandea SRL</option>
					<option>Versona SA</option>
				</select>
			</div>
			<div class="form-group">
				<label for="data-decont">Data decont</label>
				<input type="text" class="form-control" id="data-decont" placeholder="Data decont">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label for="client">Furnizor</label>
				<select class="form-control" id="client">
					<option>Rail Force SRL</option>
					<option>XXX SRL</option>
					<option>YYYYY SA</option>
				</select>
			</div>
			<div class="form-group">
				<label for="numar-decont">Numar decont</label>
				<input type="text" class="form-control" id="numar-decont" placeholder="Numar decont">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8">
			<div class="form-group">
				<label for="numar-comanda">Numar comanda</label>
				<input type="text" class="form-control" id="numar-comanda" placeholder="Numar comanda">
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-8">
			<table class="table table-striped table-hover item-table">
				<thead>	
					<tr class="header">
						<th class="delete"></th>
						<th class="name">UM</th>
						<th class="description">Descriere</th>
						<th class="qty">Cantitate</th>
						<th class="price">TVA</th>
						<th class="eur">Curs</th>
						<th class="price">Pret</th>
						<th class="item-total">Total</th>
					</tr>	
				</thead>
				<tbody>	
					<tr id="0" class="item">
						<td>
							<a href="#" onclick="In.remove_line_item('0'); return false;"><img src="img/delete.jpg"></a> 
						</td>
						<td>
							<input name="data[Item][0][id]" value="717" id="Item0Id" type="hidden">
							<div class="input select required">
								<select name="data[Item][0][unit_id]" id="Item0UnitId" required="required">
									<option value="6" selected="selected">buc</option>
									<option value="9">m</option>
									<option value="11">mc</option>
									<option value="17">mp</option>
									<option value="7">ore</option>
									<option value="10">tone</option>
									<option value="8">zile</option>
								</select>
							</div>  
						</td>
						<td>
							<div class="form-group">
								<textarea name="data[Item][0][description]" rows="2" cols="20" id="Item0Description">aass</textarea>
							</div>  
						</td>
						<td>
							<div class="form-group">
								<input name="data[Item][0][qty]" onchange="In.refresh(); return false;" value="1.00" id="Item0Qty" type="text">
							</div>  
						</td>

						<td> 
							<div class="form-group">
								<input name="data[Item][0][taxRate]" onchange="In.refresh(); return false;" value="19.00" id="Item0TaxRate" type="text">
							</div>  
						</td>
						<td> 
							<div>
								<input name="data[Item][0][eur]" onchange="In.refresh(); return false;"  value="4.5509" id="Item0Eur" type="text">
							</div>  
						</td>
						<td> 
							<div>
								<input name="data[Item][0][price]" onchange="In.refresh(); return false;" size="5" value="3374.0000" id="Item0Price" type="text">
							</div>  
						</td>
						<td>
							<div id="Item0Total">15354.74</div>
						</td>
					</tr>			

						
				 </tbody>
				 <tbody id="items"><!-- add rows with javascript --></tbody>
					
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8">
			<div style="float: right;margin-right: 20px;"><a href="#" onclick="In.add_line_item(); return false;"><img src="img/plus.jpg"></a></div>

			<table class="table total-table" align="right">
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>Sub total</strong>
				</td>
				<td class="totals">
					  <div id="subtotal">15354.74</div>
				</td>
			</tr>
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>TVA</strong>
				</td>
				<td class="totals">
					<div id="tax">2917.40</div>
				</td>
			</tr>  
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>Total</strong>
				</td>
				<td class="totals">
					<div id="total">18272.14</div>
				</td>
			</tr>
			</table>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<label for="client">Categorie</label>
				<select class="form-control" id="client">
					<option>Transport marfa periculoasa</option>
					<option>Manevra feroviara</option>
					<option>Altele</option>
				</select>
			</div>
			<div class="form-group">
				<label for="data-exec">Data executie</label>

				<input type="text" class="form-control" id="data-exec" placeholder="mm/dd/yyyy">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label for="client">Categorie decont</label>
				<select multiple="" class="form-control">
					<option>Transport marfa</option>
					<option>Transport marfa periculoasa</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8">
			<div class="form-group">
				<label for="client">Note 1</label>
				<textarea class="form-control" rows="3" id="textArea"></textarea>
				<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			</div>
			<div class="form-group">
				<label for="client">Note 2</label>
				<textarea class="form-control" rows="3" id="textArea"></textarea>
				<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8">
			<div class="form-group">
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-primary">Gata</button>
			</div>
		</div>
	</div>							
	
<div class="form-group">

</div>							
	</fieldset>	
</form>					

