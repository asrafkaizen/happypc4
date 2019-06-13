<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>

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
