<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift[]|\Cake\Collection\CollectionInterface $shifts
 */
?>
<br>
<div>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#">List of Shifts</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Users</a>
    <div class="dropdown-menu">
      <a><?= $this->Html->link(__('List'), ['controller'=> 'Users','action' => 'index'], array('class' => 'dropdown-item')); ?></a>
      <a><?= $this->Html->link(__('New User'), ['controller'=> 'Users','action' => 'add'], array('class' => 'dropdown-item')); ?></a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Shifts</a>
    <div class="dropdown-menu">
      <a><?= $this->Html->link(__('List'), ['controller' => 'Shifts', 'action' => 'index'], array('class' => 'dropdown-item')); ?></a>
      <a><?= $this->Html->link(__('Add New'), ['controller' => 'Shifts', 'action' => 'add'], array('class' => 'dropdown-item')); ?></a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Computers</a>
    <div class="dropdown-menu">
      <a><?= $this->Html->link(__('List'), ['controller' => 'Computers', 'action' => 'index'], array('class' => 'dropdown-item')); ?></a>
      <a><?= $this->Html->link(__('Add New'), ['controller' => 'Computers', 'action' => 'add'], array('class' => 'dropdown-item')); ?></a>
    </div>
  </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Clients</a>
    <div class="dropdown-menu">
      <a><?= $this->Html->link(__('List'), ['controller' => 'Locations', 'action' => 'index'], array('class' => 'dropdown-item')); ?></a>
      <a><?= $this->Html->link(__('Add New'), ['controller' => 'Locations', 'action' => 'add'], array('class' => 'dropdown-item')); ?></a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
<br>

    <h3><?= __('Shifts') ?></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><a><?= $this->Paginator->sort('Staff ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Location ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Bill ID') ?></th>
                <th scope="col" class="actions" colspan="3" ><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shifts as $shift): ?>
            <tr class="table-light">
                <td><?= $this->Number->format($shift->user_id) ?></td>
                <td><?= $this->Number->format($shift->location_id) ?></td>
                <td><?= $this->Number->format($shift->bill_id) ?></td>

                <td class="actions">

                    <?php
                     echo "<a href='/happypc4/shifts/viewk?u=",$shift->user_id,
                    "&l=",$shift->location_id,
                    "&b=",$shift->bill_id,
                    "' class='btn btn-info'>View</a>"; 
                    ?>
                    <?php
                     echo "<a href='/happypc4/shifts/editk?u=",$shift->user_id,
                    "&l=",$shift->location_id,
                    "&b=",$shift->bill_id,
                    "' class='btn btn-warning'>Edit</a>"; 
                    ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shift->bill_id], array('class' => 'btn btn-danger'), ['confirm' => __('Are you sure you want to delete # {0}?', $shift->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <li class="page-item disabled"><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
            <li class="page-item active"><?= $this->Paginator->numbers() ?></li>
            <li class="page-item"><?= $this->Paginator->next(__('next') . ' >') ?></li>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
