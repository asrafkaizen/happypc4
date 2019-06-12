<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
    header("Location:login");
    die();
}

?>
<br>
<?= $this->element('navigation') ?>
<br>
    <h3><?= __('Users') ?></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><a><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mxid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col" class="actions" colspan="3" ><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr class="table-light">
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= $this->Number->format($user->mxid) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <!--<td><?= h($user->password) ?></td>-->
                <td><?= h($user->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], array('class' => 'btn btn-info')); ?>
                    <?php
                    if ($admin){ ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], array('class' => 'btn btn-warning')); ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], array('class' => 'btn btn-danger'), ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    <?php } ?>
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