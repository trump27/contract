<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Contract'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Contractnames'), ['controller' => 'Contractnames', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Contractname'), ['controller' => 'Contractnames', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Contract') ?></h1>
<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('contractname_id'); ?></th>
            <th><?= $this->Paginator->sort('file'); ?></th>
            <th><?= $this->Paginator->sort('dir'); ?></th>
            <th><?= $this->Paginator->sort('size'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contracts as $contract): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $contract->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $contract->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td><?= $this->Number->format($contract->id) ?></td>
            <td>
                <?= $contract->has('client') ? $this->Html->link($contract->client->client_name, ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?>
            </td>
            <td>
                <?= $contract->has('customer') ? $this->Html->link($contract->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $contract->customer->id]) : '' ?>
            </td>
            <td>
                <?= $contract->has('contractname') ? $this->Html->link($contract->contractname->contract_name, ['controller' => 'Contractnames', 'action' => 'view', $contract->contractname->id]) : '' ?>
            </td>
            <td><?= h($contract->file) ?></td>
            <td><?= h($contract->dir) ?></td>
            <td><?= $this->Number->format($contract->size) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
