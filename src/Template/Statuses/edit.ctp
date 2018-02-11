<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $status->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $status->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Status') ?></h1>
<?= $this->Form->create($status, ['align' => [
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
    <legend><?= __('Edit {0}', ['Status']) ?></legend>
    <?php
    echo $this->Form->control('code');
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
