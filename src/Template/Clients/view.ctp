<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Papers'), ['controller' => 'Papers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paper'), ['controller' => 'Papers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= h($client->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reg Comert') ?></th>
            <td><?= h($client->reg_comert) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cui') ?></th>
            <td><?= h($client->cui) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cont Bancar') ?></th>
            <td><?= h($client->cont_bancar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Banca') ?></th>
            <td><?= h($client->banca) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $client->has('user') ? $this->Html->link($client->user->username, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($client->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($client->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($client->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($client->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($client->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($client->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($client->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($client->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($client->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($client->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($client->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Papers') ?></h4>
        <?php if (!empty($client->papers)): ?>
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
            <?php foreach ($client->papers as $papers): ?>
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
</div>
