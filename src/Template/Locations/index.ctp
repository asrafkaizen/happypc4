<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location[]|\Cake\Collection\CollectionInterface $locations
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
<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('map') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr class="table-light">
                <td><?= $this->Number->format($location->id) ?></td>
                <td><?= h($location->name) ?></td>
                <td><?= h($location->map) ?></td>
                <td><?= $this->Number->format($location->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id], array('class' => 'btn btn-info')); ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id], array('class' => 'btn btn-warning')); ?>

                    <?php
                    if ($admin){ ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], array('class' => 'btn btn-danger'), ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
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
