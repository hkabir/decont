<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Papers'), ['controller' => 'Papers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paper'), ['controller' => 'Papers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->username) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($user->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($user->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($user->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($user->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($user->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($user->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Categories') ?></h4>
        <?php if (!empty($user->categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->categories as $categories): ?>
            <tr>
                <td><?= h($categories->id) ?></td>
                <td><?= h($categories->name) ?></td>
                <td><?= h($categories->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($user->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Reg Comert') ?></th>
                <th scope="col"><?= __('Cui') ?></th>
                <th scope="col"><?= __('Cont Bancar') ?></th>
                <th scope="col"><?= __('Banca') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Fax') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->clients as $clients): ?>
            <tr>
                <td><?= h($clients->id) ?></td>
                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->reg_comert) ?></td>
                <td><?= h($clients->cui) ?></td>
                <td><?= h($clients->cont_bancar) ?></td>
                <td><?= h($clients->banca) ?></td>
                <td><?= h($clients->user_id) ?></td>
                <td><?= h($clients->address) ?></td>
                <td><?= h($clients->city) ?></td>
                <td><?= h($clients->state) ?></td>
                <td><?= h($clients->zip) ?></td>
                <td><?= h($clients->country) ?></td>
                <td><?= h($clients->url) ?></td>
                <td><?= h($clients->phone) ?></td>
                <td><?= h($clients->fax) ?></td>
                <td><?= h($clients->email) ?></td>
                <td><?= h($clients->notes) ?></td>
                <td><?= h($clients->created) ?></td>
                <td><?= h($clients->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Papers') ?></h4>
        <?php if (!empty($user->papers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('PaperId') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Currency Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col"><?= __('Provider Id') ?></th>
                <th scope="col"><?= __('PurchaseOrder') ?></th>
                <th scope="col"><?= __('TaxRate') ?></th>
                <th scope="col"><?= __('SubTotal') ?></th>
                <th scope="col"><?= __('TaxTotal') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Delegat') ?></th>
                <th scope="col"><?= __('Identity Card') ?></th>
                <th scope="col"><?= __('Notes1') ?></th>
                <th scope="col"><?= __('Notes2') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->papers as $papers): ?>
            <tr>
                <td><?= h($papers->id) ?></td>
                <td><?= h($papers->paperId) ?></td>
                <td><?= h($papers->date) ?></td>
                <td><?= h($papers->currency_id) ?></td>
                <td><?= h($papers->user_id) ?></td>
                <td><?= h($papers->status_id) ?></td>
                <td><?= h($papers->client_id) ?></td>
                <td><?= h($papers->provider_id) ?></td>
                <td><?= h($papers->purchaseOrder) ?></td>
                <td><?= h($papers->taxRate) ?></td>
                <td><?= h($papers->subTotal) ?></td>
                <td><?= h($papers->taxTotal) ?></td>
                <td><?= h($papers->total) ?></td>
                <td><?= h($papers->delegat) ?></td>
                <td><?= h($papers->identity_card) ?></td>
                <td><?= h($papers->notes1) ?></td>
                <td><?= h($papers->notes2) ?></td>
                <td><?= h($papers->created) ?></td>
                <td><?= h($papers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Papers', 'action' => 'view', $papers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Papers', 'action' => 'edit', $papers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Papers', 'action' => 'delete', $papers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $papers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Providers') ?></h4>
        <?php if (!empty($user->providers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Reg Comert') ?></th>
                <th scope="col"><?= __('Cui') ?></th>
                <th scope="col"><?= __('Cont Bancar') ?></th>
                <th scope="col"><?= __('Banca') ?></th>
                <th scope="col"><?= __('Capital Social') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Fax') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->providers as $providers): ?>
            <tr>
                <td><?= h($providers->id) ?></td>
                <td><?= h($providers->created) ?></td>
                <td><?= h($providers->modified) ?></td>
                <td><?= h($providers->name) ?></td>
                <td><?= h($providers->reg_comert) ?></td>
                <td><?= h($providers->cui) ?></td>
                <td><?= h($providers->cont_bancar) ?></td>
                <td><?= h($providers->banca) ?></td>
                <td><?= h($providers->capital_social) ?></td>
                <td><?= h($providers->user_id) ?></td>
                <td><?= h($providers->address) ?></td>
                <td><?= h($providers->city) ?></td>
                <td><?= h($providers->state) ?></td>
                <td><?= h($providers->zip) ?></td>
                <td><?= h($providers->country) ?></td>
                <td><?= h($providers->url) ?></td>
                <td><?= h($providers->phone) ?></td>
                <td><?= h($providers->fax) ?></td>
                <td><?= h($providers->email) ?></td>
                <td><?= h($providers->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Providers', 'action' => 'view', $providers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Providers', 'action' => 'edit', $providers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Providers', 'action' => 'delete', $providers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
