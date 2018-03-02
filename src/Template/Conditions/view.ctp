<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Condition'), ['action' => 'edit', $condition->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Condition'), ['action' => 'delete', $condition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condition->id)]) ?> </li>
<li><?= $this->Html->link(__('List Conditions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Condition'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Condition'), ['action' => 'edit', $condition->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Condition'), ['action' => 'delete', $condition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condition->id)]) ?> </li>
<li><?= $this->Html->link(__('List Conditions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Condition'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Condition') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($condition->name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($condition->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($condition->id) ?></td>
        </tr>
    </table>
</div>

