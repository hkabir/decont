<td><?= $this->Number->format($paper->id) ?></td>
<td><?= $paper->has('status') ?  : '' ?></td>
<td><?= $paper->has('provider') ? $this->Html->link($paper->provider->name, ['controller' => 'Providers', 'action' => 'view', $paper->provider->id]) : '' ?></td>
<td><?= h($paper->purchaseOrder) ?></td>
<td><?= $this->Number->format($paper->taxRate) ?></td>
<td><?= $this->Number->format($paper->subTotal) ?></td>
<td><?= $this->Number->format($paper->taxTotal) ?></td>
<td><?= h($paper->delegat) ?></td>
<td><?= h($paper->identity_card) ?></td>
<td><?= h($paper->notes1) ?></td>
<td><?= h($paper->notes2) ?></td>
<td><?= h($paper->created) ?></td>
<td><?= h($paper->modified) ?></td>
<?= $this->Html->link(__('View'), ['action' => 'view', $paper->id]) ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paper->id)]) ?>


<?php echo $this->Form->postLink($this->Html->tag('span','',['class' => 'glyphicon glyphicon-trash']).' Sterge2',['action' => 'delete'], ['class' => 'btn btn-info btn-large'], ['confirm' => __('Are you sure you want to delete # {0}?', $paper->id)]); ?>
<?php //echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-trash']).' Sterge',['action' => 'delete', $paper->id],['class' => 'btn btn-success', 'role' => 'button' , 'escape' => false]);?>
<?= $this->Form->postLink($this->Html->tag('span','',['class' => 'glyphicon glyphicon-trash']).' Sterge 3', ['action' => 'delete', $paper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paper->id)], ['class' => 'btn btn-success', 'role' => 'button' , 'escape' => false]) ?>

<td class="actions">
	<?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
	<?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
	<?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
</td>							
							
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>

<nav class="large-3 medium-4 columns" id="actions-sidebar">   
 
<ul class="side-nav">        

<li class="heading"><?= __('Actions') ?></li>        

<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>        

<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>        

<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>        

<li><?= $this->Html->link(__('List Papers'), ['controller' => 'Papers', 'action' => 'index']) ?></li>        

<li><?= $this->Html->link(__('New Paper'), ['controller' => 'Papers', 'action' => 'add']) ?></li>   

 </ul>
 
 </nav>





<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $client->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Papers'), ['controller' => 'Papers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paper'), ['controller' => 'Papers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Edit Client') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('reg_comert');
            echo $this->Form->control('cui');
            echo $this->Form->control('cont_bancar');
            echo $this->Form->control('banca');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('address');
            echo $this->Form->control('city');
            echo $this->Form->control('state');
            echo $this->Form->control('zip');
            echo $this->Form->control('country');
            echo $this->Form->control('url');
            echo $this->Form->control('phone');
            echo $this->Form->control('fax');
            echo $this->Form->control('email');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
