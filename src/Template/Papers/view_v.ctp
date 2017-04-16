<div class="panel panel-info">
	<div class="panel-heading">
		<h1 class="panel-title"><i class="glyphicon glyphicon-pencil"></i> Vizualizare decont nr.<? echo h($paper->id); ?></h1>
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
		
		<!-- Table -->
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"><?= __('Name') ?></th>
					<th scope="col"><?= __('Description') ?></th>
					<th scope="col"><?= __('Unit Id') ?></th>
					<th scope="col"><?= __('Qty') ?></th>
					<th scope="col"><?= __('Type Id') ?></th>
					<th scope="col"><?= __('Nr Vag Manevra') ?></th>
					<th scope="col"><?= __('Tone Manevra') ?></th>
					<th scope="col"><?= __('Nr Vag Transp') ?></th>
					<th scope="col"><?= __('Tone Transp') ?></th>
					<th scope="col"><?= __('Km') ?></th>
					<th scope="col"><?= __('Price') ?></th>
					<th scope="col"><?= __('Rate') ?></th>
					<th scope="col"><?= __('Total') ?></th>
					<th scope="col" class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			
			<tbody>
			
				<?php foreach ($paper->items as $items): ?>
				<tr>
					<td><?= h($items->name) ?></td>
					<td><?= h($items->description) ?></td>
					<td><?= h($items->unit_id) ?></td>
					<td><?= h($items->qty) ?></td>
					<td><?= h($items->type_id) ?></td>
					<td><?= h($items->nr_vag_manevra) ?></td>
					<td><?= h($items->tone_manevra) ?></td>
					<td><?= h($items->nr_vag_transp) ?></td>
					<td><?= h($items->tone_transp) ?></td>
					<td><?= h($items->km) ?></td>
					<td><?= h($items->price) ?></td>
					<td><?= h($items->rate) ?></td>
					<td><?= h($items->total) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
						<?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
						<?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
					</td>
				</tr>
				<?php endforeach; ?>			
				

				<tr>
					<td colspan="7"></td>
					<td><b>Sub Total: </b></td>
					<td><?= $this->Number->format($paper->subTotal) ?></td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td><b>TVA: </b></td>
					<td><?= $this->Number->format($paper->taxTotal) ?></td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td><b>Total General: </b></td>
					<td><?= $this->Number->format($paper->total) ?></td>
				</tr>

			</tbody> 
		</table>
	</div>
	
	<div class="panel-footer">
		Note: <?= h($paper->notes1) ?> <br /> <?= h($paper->notes2) ?> <br />
	</div>
</div>