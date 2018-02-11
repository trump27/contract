<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New License'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('order_id'); ?></th>
            <th><?= $this->Paginator->sort('status_id'); ?></th>
            <th><?= $this->Paginator->sort('issued'); ?></th>
            <th><?= $this->Paginator->sort('license_no'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($licenses as $license): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $license->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $license->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $license->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td><?= $this->Number->format($license->id) ?></td>
            <td>
                <?= $license->has('client') ? $this->Html->link($license->client->client_name, ['controller' => 'Clients', 'action' => 'view', $license->client->id]) : '' ?>
            </td>
            <td>
                <?= $license->has('customer') ? $this->Html->link($license->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $license->customer->id]) : '' ?>
            </td>
            <td>
                <?= $license->has('order') ? $this->Html->link($license->order->product_name, ['controller' => 'Orders', 'action' => 'view', $license->order->id]) : '' ?>
            </td>
            <td>
                <?= $license->has('status') ? $this->Html->link($license->status->name, ['controller' => 'Statuses', 'action' => 'view', $license->status->id]) : '' ?>
            </td>
            <td><?= h($license->issued) ?></td>
            <td><?= h($license->license_no) ?></td>
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
