<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?= h($client->name) ?></h3>
	</div>
	<div class="panel-body">
		<h4>Adresa:<?= h($client->address) ?>, <?= h($client->city) ?> </h4>
		<p>Cod fiscal:<?= h($client->cui) ?>, Reg Comert: <?= h($client->reg_comert) ?></p>
		<p>Email: <?= h($client->email) ?> | Telefon: <?= h($client->phone) ?>, Fax: <?= h($client->fax) ?></p>
		<p>Cont Bancar: <?= h($client->cont_bancar) ?>, <?= h($client->banca) ?></p>
	</div> 
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<?= $this->Html->link('Decont nou', ['controller' => 'Papers', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
			<?= $this->Html->link('Editare', ['controller' => 'Clients', 'action' => 'edit', $client->id], ['class' => 'btn btn-default']) ?>
			<?= $this->Form->postLink('Sterge', ['action' => 'delete', $client->id], ['class' => 'btn btn-danger', 'confirm' => __('Sigur doriti sa stergeti clientul # {0}?', $client->id)]) ?>
		</div>
	</div>
</div>