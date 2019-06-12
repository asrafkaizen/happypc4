<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<br>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3><br>
    <table class="table table-hover">
        <tr>
            <th scope="row" class="table-info"><?= __('Name') ?></th>
            <td class="table-light"><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info"><?= __('Email') ?></th>
            <td class="table-light"><?= h($user->email) ?></td>
        </tr>
        <!--<tr>
            <th scope="row" class="table-info"><?= __('Password') ?></th>
            <td class="table-light"><?= h($user->password) ?></td>
        </tr>-->
        <tr>
            <th scope="row" class="table-info"><?= __('Phone') ?></th>
            <td class="table-light"><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info"><?= __('Id') ?></th>
            <td class="table-light"><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info"><?= __('Mxid') ?></th>
            <td class="table-light"><?= $this->Number->format($user->mxid) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Shifts') ?></h4>
        <?php if (!empty($user->shifts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Bill Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->shifts as $shifts): ?>
            <tr>
                <td><?= h($shifts->user_id) ?></td>
                <td><?= h($shifts->location_id) ?></td>
                <td><?= h($shifts->bill_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shifts', 'action' => 'view', $shifts->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shifts', 'action' => 'edit', $shifts->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shifts', 'action' => 'delete', $shifts->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shifts->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <br><br>
    <button type="button" class="btn btn-outline-info" onclick="goBack()">Go Back</button>
</div>
