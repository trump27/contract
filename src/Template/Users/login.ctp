<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/signin');
?>

<?= $this->Form->create('', [
    'class' => 'form-signin'
]); ?>
    <h2 class="form-signin-heading">Please login</h2>
    <input type="text" name="username" placeholder="username"
        autofocus id="username" class="form-control" required>
    <input type="password" name="password" placeholder="password" 
        autofocus id="password" class="form-control" required>

<?= $this->Form->button(__("Login"), ['class'=>'btn-primary btn-block']); ?>
<?= $this->Form->end() ?>
