<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift[]|\Cake\Collection\CollectionInterface $shifts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shift'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bills'), ['controller' => 'Bills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bill'), ['controller' => 'Bills', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shifts index large-9 medium-8 columns content">
    <h3><?= __('Shifts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bill_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shifts as $shift): ?>
            <tr>
                <td><?= $shift->has('user') ? $this->Html->link($shift->user->name, ['controller' => 'Users', 'action' => 'view', $shift->user->id]) : '' ?></td>
                <td><?= $shift->has('location') ? $this->Html->link($shift->location->name, ['controller' => 'Locations', 'action' => 'view', $shift->location->id]) : '' ?></td>
                <td><?= $shift->has('bill') ? $this->Html->link($shift->bill->id, ['controller' => 'Bills', 'action' => 'view', $shift->bill->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shift->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shift->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shift->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shift->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
