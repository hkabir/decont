<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paper->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paper->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Papers'), ['action' => 'index']) ?></li>
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
<div class="papers form large-9 medium-8 columns content">
    <?= $this->Form->create($paper) ?>
    <fieldset>
        <legend><?= __('Edit Paper') ?></legend>
        <?php
            echo $this->Form->control('paperId');
            echo $this->Form->control('date');
            echo $this->Form->control('currency_id', ['options' => $currencies]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('status_id', ['options' => $statuses]);
            echo $this->Form->control('client_id', ['options' => $clients]);
            echo $this->Form->control('provider_id', ['options' => $providers]);
            echo $this->Form->control('purchaseOrder');
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
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
