<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Computer $computer
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Auth']['User']['mxid'])){

}else{
    //tak login takleh view data
    header("Location:users/login");
    die();
}

?>
<br>
<div class="users view large-9 medium-8 columns content">
    <h4><?= h($computer->id) ?></h4>
    <table class="table table-hover">
        <tr>
            <th  scope="row" class="table-info"><?= __('Location') ?></th>
            <td class="table-light"><?= $computer->has('location') ? $this->Html->link($computer->location->name, ['controller' => 'Locations', 'action' => 'view', $computer->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th  scope="row" class="table-info"><?= __('Model') ?></th>
             <td class="table-light"><?= h($computer->model) ?></td>
        </tr>
        <tr>
            <th  scope="row" class="table-info"><?= __('Cond') ?></th>
             <td class="table-light"><?= h($computer->cond) ?></td>
        </tr>
        <tr>
            <th  scope="row" class="table-info"><?= __('Id') ?></th>
             <td class="table-light"><?= $this->Number->format($computer->id) ?></td>
        </tr>
    </table>
</div>
