<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appform $appform
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $appform->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $appform->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Appforms'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $appform->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $appform->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Appforms'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Appform') ?></h1>
<?= $this->Form->create($appform, ['align' => [
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
    <legend><?= __('Edit {0}', ['Appform']) ?></legend>
    <?php
    echo $this->Form->control('form_name');
    echo $this->Form->control('file');
    echo $this->Form->control('dir', ['value'=>'webroot\\doc_template\\', 'disabled'=>'disabled']);
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
