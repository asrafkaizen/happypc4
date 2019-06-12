<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<br>
<?= $this->element('navigation') ?>
<br>
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
        <?php
            echo $this->Form->control('name', array('class' => 'form-control')); ;
        ?><br>
        <?php
            echo $this->Form->control('map', array('class' => 'form-control')); ;
        ?><br>
        <?php
            echo $this->Form->control('phone', array('class' => 'form-control')); ;
        ?><br>
    </fieldset>
    <br>
    <table>
    <tr>
    <td><?= $this->Form->submit('Submit', array('class' => 'btn btn-outline-info')); ?><td>
    <td style="padding-left: 979px;"><button type="button"  class="btn btn-outline-info" onclick="goBack()">Go Back</button></td>
    </tr>
    </table>
</div>
