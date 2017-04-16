<div class="panel panel-info">
	<div class="panel-heading">
		<h1 class="panel-title"><i class="glyphicon glyphicon-pencil"></i> Vizualizare decont nr.<?php echo h($paper->id); ?></h1>
		<p class="pull-right"> Furnizor: <?= $paper->provider->name ?></p>
		<p> Categorie decont: <?php foreach($paper['categories'] as $category): echo $category['name'].'|'; endforeach;?></p>
	</div>
	<div class="panel-body">
	
		<div class="container">
			<div class="row">
				<div class="col-md-6">						
					<strong><?= $paper->has('client') ? $this->Html->link($paper->client->name, ['controller' => 'Clients', 'action' => 'view', $paper->client->id]) : '' ?></strong><br>
					Cod fiscal:<?php echo $paper->client->cui; ?> <br> Reg Comertului: <?php echo $paper->client->reg_comert; ?><br> <?php echo $paper->client->address; ?> <?php echo $paper->client->city; ?>, <?php echo $paper->client->zip; ?><br>
					<?php echo $paper->client->country; ?>  
				</div>
				<div class="col-md-6">						
					Data decont <?= h($paper->date) ?><br />
					Moneda: <?= $paper->has('currency') ? $this->Html->link($paper->currency->name, ['controller' => 'Currencies', 'action' => 'view', $paper->currency->id]) : '' ?><br />
					Numar comanda: <?= h($paper->purchaseOrder) ?> <br />
					Utilizator: <?= $paper->has('user') ? $this->Html->link($paper->user->firstName.' '.$paper->user->lastName, ['controller' => 'Users', 'action' => 'view', $paper->user->id]) : '' ?>			<br />
					Stare: <?= $paper->has('status') ? $this->Html->link($paper->status->name, ['controller' => 'Statuses', 'action' => 'view', $paper->status->id]) : '' ?>
				</div>
			</div>
		</div>
		<?php //pr($paper); ?>
		<!-- Table -->
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"><?= __('Name') ?></th>
					<th scope="col"><?= __('Unit Id') ?></th>
					<th scope="col"><?= __('Qty') ?></th>
					<th scope="col"><?= __('Type') ?></th>
					<th scope="col">Vag/Tone Manevra</th>
					<th scope="col">Vag/Tone Transp</th>
					<th scope="col"><?= __('Km') ?></th>
					<th scope="col"><?= __('Price') ?></th>
					<th scope="col"><?= __('Rate') ?></th>
					<th scope="col"><?= __('Total') ?></th>
				</tr>
			</thead>
			
			<tbody id="items">
				
				<?php if(is_array($paper['items'])): ?>
					
					<?php foreach ($paper->items as $items): ?>

						<?php echo $this->element('line_item', ['items' => $items]); ?>

					<?php endforeach; ?>			
					
				<?php endif; ?>				
				
			</tbody> 
		</table>
		<div id="new-item"><?php //echo $this->Html->link('add new line', '#'); ?></div>
		<table class="total-table">
				<tr>
					<td colspan="8"></td>
					<td><b>Sub Total: </b></td>
					<td><?= $this->Number->format($paper->subTotal) ?></td>
				</tr>
				<tr>
					<td colspan="8"></td>
					<td><b>TVA: </b></td>
					<td><?= $this->Number->format($paper->taxTotal) ?></td>
				</tr>
				<tr>
					<td colspan="8"></td>
					<td><b>Total General: </b></td>
					<td><?= $this->Number->format($paper->total) ?></td>
				</tr>

		</table>
	</div>
	
	<div class="panel-footer">
		Note: <?= h($paper->notes1) ?> <br /> <?= h($paper->notes2) ?> <br />
	</div>
</div>

