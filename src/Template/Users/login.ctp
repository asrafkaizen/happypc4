<br><br>
<legend>Login</legend>
<?= $this->Form->create() ?>
<?= $this->Form->input('email', array('class' => 'form-control')); ?>
<?= $this->Form->input('password', array('class' => 'form-control')); ?>
<br>
<?= $this->Form->submit('Login', array('class' => 'btn btn-primary btn-lg')); ?>
<?= $this->Form->end() ?>
