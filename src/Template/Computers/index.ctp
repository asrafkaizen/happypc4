<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Computer[]|\Cake\Collection\CollectionInterface $computers
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Auth']['User']['mxid'])){
    if ( ($_SESSION['Auth']['User']['mxid'] == '1')){
        $admin = 1;
    }else {
      $admin = 0;
    }
}else{
    //tak login takleh view data
    header("Location:users/login");
    die();
}

?>
<br>
<?= $this->element('navigation') ?>
<br>
<div>
    <h3><?= __('Computers') ?></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cond') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($computers as $computer): ?> 
            <tr class="table-light">
                <td><?= $this->Number->format($computer->id) ?></td>
                <td><?= $computer->has('location') ? $this->Html->link($computer->location->name, ['controller' => 'Locations', 'action' => 'view', $computer->location->id]) : '' ?></td>
                <td><?= h($computer->model) ?></td>
                <td><?= h($computer->cond) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $computer->id], array('class' => 'btn btn-info')); ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $computer->id], array('class' => 'btn btn-warning')); ?>
                    <?php
                    if ($admin){ ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $computer->id], array('class' => 'btn btn-danger'), ['confirm' => __('Are you sure you want to delete # {0}?', $computer->id)]) ?>
                    <?php } ?>
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
