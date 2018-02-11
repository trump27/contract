<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Languages') ?></h1>
<?= $this->Form->create($language, ['align' => [
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
    <legend><?= __('Add {0}', ['Language']) ?></legend>
    <?php
    echo $this->Form->control('language_name');
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
