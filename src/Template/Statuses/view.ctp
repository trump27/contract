<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
<li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
<li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Status') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($status->name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($status->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Code') ?></td>
            <td><?= h($status->code) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($status->name) ?></td>
        </tr>
    </table>
</div>
