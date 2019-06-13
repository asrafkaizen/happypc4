<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
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
<br><br>

<div>
    <?= $this->Form->create($shift) ?>
    <fieldset>
        <legend><?= __('Edit Shift') ?></legend>
        <br>
        <?=$this->Form->control('Staff ID', array('class' => 'form-control')); ?>
        <br>
        <?=$this->Form->control('Staff Location', array('class' => 'form-control')); ?>
        <br>
        <?=$this->Form->control('Staff Bill', array('class' => 'form-control')); ?>


    </fieldset>
    <br>
    <table>
    <tr>
    <td><?= $this->Form->submit('Update', array('class' => 'btn btn-outline-info')); ?><td>
    <td style="padding-left: 979px;"><button type="button"  class="btn btn-outline-info" onclick="goBack()">Go Back</button></td>
    </tr>
    </table>
    <?= $this->Form->end() ?>
</div>
