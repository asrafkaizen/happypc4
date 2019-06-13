<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<br>
<?= $this->element('navigation') ?>
<br><br>
<div class="bills form large-9 medium-8 columns content">
    <?= $this->Form->create($bill) ?>
    <fieldset>
        <legend><?= __('Add Bill') ?></legend>
        <?php
            echo $this->Form->control('payment', array('class' => 'form-control')); ;
            echo $this->Form->control('cost', array('class' => 'form-control')); ;
            echo $this->Form->control('time', array('class' => 'form-control')); ;
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit', array('class' => 'btn btn-primary btn-lg'))); ?>
    <?= $this->Form->end() ?>
</div>
