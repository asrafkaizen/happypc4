<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>
<br>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($shift->user_id) ?></h3><br>
    <table class="table table-hover">
    <?php
    $queryS = "select * from shifts";
    $conn = new \mysqli("localhost", "root", "", "happypc");
    $resultS = mysqli_query($conn, $queryS) or die(mysqli_error($conn));
    while ($dataS = mysqli_fetch_array($resultS)){
        $userids = $dataS['user_id'];
        $locationids = $dataS['location_id'];
        $billids = $dataS['bill_id'];
    ?>
        <tr>
            <th scope="row" class="table-info">User ID</th>
            <td class="table-light"><?= $userids ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info">Location ID</th>
            <td class="table-light"><?= $locationids ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info">Bill ID</th>
            <td class="table-light"><?= $billids ?></td>
        </tr>
    <?php
    }
    ?>
    </table>

<!--div class="users view large-9 medium-8 columns content">
    <h4>
    <!?= h($computer->id) ?> //uncomment by removing the !
    </h4>
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
</div-->
