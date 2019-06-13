<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>

<div>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#">Add new!</a>
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
</div>
<br><br>

<div class="shifts form large-9 medium-8 columns content">
    <?= $this->Form->create($shift) ?>
    <fieldset>
        <legend><?= __('Add Shift') ?></legend>
        <?php

            $mysqli = NEW MySQLi('localhost','root','','happypc');
            $resultSet = $mysqli->query("SELECT id FROM users");
            $resultSet2 = $mysqli->query("SELECT id,name FROM locations");
            $resultSet3 = $mysqli->query("SELECT id FROM bills");
            echo $this->Flash->render();

        ?>
        <br>
        <h6>Enter User ID:</h6>
        <select name="user_id">
            <?php
                while($rows=$resultSet->fetch_assoc())
                {
                    $user_id = $rows['id'];
                    echo "<option value='$user_id'>$user_id</option>";
                }
            ?>
        </select>
        <br><br>
        <h6>Enter Location ID:</h6>
        <select name="location_id">
            <?php
                while($rows=$resultSet2->fetch_assoc())
                {
                    $location_name = $rows['name'];
                    $location_id = $rows['id'];
                    echo "<option value='$location_id'>$location_name</option>";
                }
            ?>
        </select>
        <br><br>
        <h6>Enter Bill ID:</h6>
        <select name="bill_id">
            <?php
                while($rows=$resultSet3->fetch_assoc())
                {
                    $bill_id = $rows['id'];
                    echo "<option value='$bill_id'>$bill_id</option>";
                }
            ?>
        </select>
        <br><br>
    <?= $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-lg')); ?>
    <?= $this->Form->end() ?>
</div>
