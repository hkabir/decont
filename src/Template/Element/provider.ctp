<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?= h($provider->name) ?></h3>
	</div>
	<div class="panel-body">
		<h4>Adresa:<?= h($provider->address) ?>, <?= h($provider->city) ?> </h4>
		<p>Cod fiscal:<?= h($provider->cui) ?>, Reg Comert: <?= h($provider->reg_comert) ?></p>
		<p>Email: <?= h($provider->email) ?> | Telefon: <?= h($provider->phone) ?>, Fax: <?= h($provider->fax) ?></p>
		<p>Cont Bancar: <?= h($provider->cont_bancar) ?>, <?= h($provider->banca) ?></p>
	</div> 
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<?= $this->Html->link('Decont nou', ['controller' => 'Papers', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
			<?= $this->Html->link('Editare', ['controller' => 'Providers', 'action' => 'edit', $provider->id], ['class' => 'btn btn-default']) ?>
			<?= $this->Form->postLink('Sterge', ['action' => 'delete', $provider->id], ['class' => 'btn btn-danger', 'confirm' => __('Sigur doriti sa stergeti providerul # {0}?', $provider->id)]) ?>
		</div>
	</div>
</div>