<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractname $contractname
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contractname->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contractname->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contractnames'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contractname->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contractname->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contractnames'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Contractnames') ?></h1>
<?= $this->Form->create($contractname, ['align' => [
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
    <legend><?= __('Edit {0}', ['Contractname']) ?></legend>
    <?php
    echo $this->Form->control('contract_name');
    echo $this->Form->control('status_id');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
