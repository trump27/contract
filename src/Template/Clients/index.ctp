<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Client'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_name'); ?></th>
            <th><?= $this->Paginator->sort('company_code'); ?></th>
            <th><?= $this->Paginator->sort('identity1'); ?></th>
            <th><?= $this->Paginator->sort('partner_flag'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $this->Number->format($client->id) ?></td>
            <td><?= h($client->client_name) ?></td>
            <td><?= h($client->company_code) ?></td>
            <td><?= h($client->identity1) ?></td>
            <td><?= $this->Number->format($client->partner_flag) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $client->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $client->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
            </td>
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
