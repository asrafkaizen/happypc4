<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift[]|\Cake\Collection\CollectionInterface $shifts
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
                    <?php
                    //todo change href into post
                    if ($admin){ 
                    echo "<a href='/happypc4/shifts/delete?u=",$shift->user_id,
                    "&l=",$shift->location_id,
                    "&b=",$shift->bill_id,
                    "' class='btn btn-danger'>Delete</a>"; 
                    } ?>
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
