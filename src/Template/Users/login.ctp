<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/signin');
?>

<?= $this->Form->create('', ['align' => [
    'sm' => [
        'left' => 3,
        'middle' => 8,
        'right' => 1
    ],
    'md' => [
        'left' => 3,
        'middle' => 6,
        'right' => 2
    ]
]]); ?>
<fieldset>
    <legend><?= __('Login') . ' Contracts' ?></legend>
    <?php
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    ?>
</fieldset>
<?= $this->Form->button(__("Login"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
