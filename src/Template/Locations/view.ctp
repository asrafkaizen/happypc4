<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Auth']['User']['mxid'])){
  //admin dan staff boleh masuk
}else{
    header("Location:http://localhost/happypc3/users/login.php");
    die();
}

?> 
<br>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <br>
    <table class="table table-hover">
        <tr>
            <th scope="row" class="table-info"><?= __('Name') ?></th>
            <td class="table-light"><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info"><?= __('Map') ?></th>
            <td class="table-light"><?= h($location->map) ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info"><?= __('Id') ?></th>
            <td class="table-light"><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info"><?= __('Phone') ?></th>
            <td class="table-light"><?= $this->Number->format($location->phone) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Computers') ?></h4>
        <?php if (!empty($location->computers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Cond') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->computers as $computers): ?>
            <tr>
                <td><?= h($computers->id) ?></td>
                <td><?= h($computers->location_id) ?></td>
                <td><?= h($computers->model) ?></td>
                <td><?= h($computers->cond) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Computers', 'action' => 'view', $computers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Computers', 'action' => 'edit', $computers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Computers', 'action' => 'delete', $computers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $computers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Shifts') ?></h4>
        <?php if (!empty($location->shifts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Bill Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->shifts as $shifts): ?>
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
