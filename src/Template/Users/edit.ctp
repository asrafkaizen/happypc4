<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Auth']['User']['mxid'])){
    if ( ($_SESSION['Auth']['User']['mxid'] == '1')){
        //mmg hanya admin boleh masuk
    }else {
      //spatutnya staff yg dia punya je bole masuk, tp kiv dlu. sume staff bole masuk
    }
}else{
    //autoredirect by cakephp
}
?>

<div >
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <br>
        <?=$this->Form->control('mxid', array('class' => 'form-control')); ?>
        <br>
        <?=$this->Form->control('name', array('class' => 'form-control')); ?>
        <br>
        <?=$this->Form->control('email', array('class' => 'form-control')); ?>
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


