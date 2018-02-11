<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Contractname'), ['action' => 'edit', $contractname->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contractname'), ['action' => 'delete', $contractname->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractname->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contractnames'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contractname'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Contractname'), ['action' => 'edit', $contractname->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contractname'), ['action' => 'delete', $contractname->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractname->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contractnames'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contractname'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Contractnames') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($contractname->contract_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($contractname->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Contract Name') ?></td>
            <td><?= h($contractname->contract_name) ?></td>
        </tr>
    </table>
</div>
