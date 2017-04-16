<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Papers'), ['controller' => 'Papers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paper'), ['controller' => 'Papers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $category->has('user') ? $this->Html->link($category->user->username, ['controller' => 'Users', 'action' => 'view', $category->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Papers') ?></h4>
        <?php if (!empty($category->papers)): ?>
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
            <?php foreach ($category->papers as $papers): ?>
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
