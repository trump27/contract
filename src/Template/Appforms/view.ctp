<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Appform'), ['action' => 'edit', $appform->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Appform'), ['action' => 'delete', $appform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appform->id)]) ?> </li>
<li><?= $this->Html->link(__('List Appforms'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Appform'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Appform'), ['action' => 'edit', $appform->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Appform'), ['action' => 'delete', $appform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appform->id)]) ?> </li>
<li><?= $this->Html->link(__('List Appforms'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Appform'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Appform') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($appform->form_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($appform->id) ?></td>
        </tr>        <tr>
            <td><?= __('Form Name') ?></td>
            <td><?= h($appform->form_name) ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= h($appform->file) ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($appform->dir) ?></td>
        </tr>

    </table>
</div>

