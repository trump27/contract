<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Condition $condition
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Conditions'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Conditions'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Condition') ?></h1>
<?= $this->Form->create($condition, ['align' => [
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
    <legend><?= __('Add {0}', ['Condition']) ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
