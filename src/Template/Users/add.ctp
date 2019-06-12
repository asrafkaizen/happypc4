<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Auth']['User']['mxid'])){
    if ($_SESSION['Auth']['User']['mxid'] == '1'){
        //mmg hanya admin boleh masuk
    }else {
      echo "You don't have access to this page because you are not an admin</p><br>
      <form action='login'>
        <input class=button type=submit value='Go to login'>
      </form>
      <input type='button' value='Return to previous page' onClick='javascript:history.go(-1)' />
      </div>";
      die();
    }
}else{
    //autoredirect by cakephp
}

?>
<br>
<?= $this->element('navigation') ?>
<br><br>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('mxid', array('class' => 'form-control')); ;
        ?><br>
        <?php
            echo $this->Form->control('name', array('class' => 'form-control')); ;
        ?><br>
        <?php
            echo $this->Form->control('email', array('class' => 'form-control')); ;
        ?><br>
        <?php
            echo $this->Form->control('password', array('class' => 'form-control')); ;
        ?><br>
        <?php
            echo $this->Form->control('phone', array('class' => 'form-control')); ;
        ?>
    </fieldset>
    <br>
    <?= $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-lg')); ?>
    <?= $this->Form->end() ?>
</div>
