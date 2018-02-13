<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Contract'), ['action' => 'edit', $contract->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contract'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contract'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Contractnames'), ['controller' => 'Contractnames', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contractname'), ['controller' => 'Contractnames', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Contract'), ['action' => 'edit', $contract->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contract'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Contractnames'), ['controller' => 'Contractnames', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Contract') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($contract->contractname->contract_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($contract->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $contract->has('client') ? $this->Html->link($contract->client->client_name, ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer') ?></td>
            <td><?= $contract->has('customer') ? $this->Html->link($contract->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $contract->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Contractname') ?></td>
            <td><?= $contract->has('contractname') ? $this->Html->link($contract->contractname->contract_name, ['controller' => 'Contractnames', 'action' => 'view', $contract->contractname->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Contract Date') ?></td>
            <td><?= h($contract->contract_date) ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= $this->My->downloadlink($contract) ?></td>
        </tr>
        <tr>
            <td><?= __('Remarks') ?></td>
            <td><?= $this->Text->autoParagraph(h($contract->remarks)); ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $contract->has('user') ? $this->Html->link($contract->user->name, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($contract->dir) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($contract->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($contract->size) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($contract->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($contract->modified) ?></td>
        </tr>
    </table>
</div>

