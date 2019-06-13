<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?> 

<div class="bills form large-9 medium-8 columns content">
    <?= $this->Form->create($bill) ?>
    <fieldset>
        <legend><?= __('Edit Bill') ?></legend>
        <br>
        <?=$this->Form->control('paument', array('class' => 'form-control')); ?>
        <br>
        <br>
        <?=$this->Form->control('costt', array('class' => 'form-control')); ?>
        <br>
        <br>
        <?=$this->Form->control('time', array('class' => 'form-control')); ?>
        <br>
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
