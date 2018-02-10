<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Licensehistory'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('order_id'); ?></th>
            <th><?= $this->Paginator->sort('status_id'); ?></th>
            <th><?= $this->Paginator->sort('issued'); ?></th>
            <th><?= $this->Paginator->sort('license_no'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($licensehistories as $licensehistory): ?>
        <tr>
            <td><?= $this->Number->format($licensehistory->id) ?></td>
            <td>
                <?= $licensehistory->has('client') ? $this->Html->link($licensehistory->client->client_name, ['controller' => 'Clients', 'action' => 'view', $licensehistory->client->id]) : '' ?>
            </td>
            <td>
                <?= $licensehistory->has('customer') ? $this->Html->link($licensehistory->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $licensehistory->customer->id]) : '' ?>
            </td>
            <td>
                <?= $licensehistory->has('order') ? $this->Html->link($licensehistory->order->product_name, ['controller' => 'Orders', 'action' => 'view', $licensehistory->order->id]) : '' ?>
            </td>
            <td>
                <?= $licensehistory->has('status') ? $this->Html->link($licensehistory->status->name, ['controller' => 'Statuses', 'action' => 'view', $licensehistory->status->id]) : '' ?>
            </td>
            <td><?= h($licensehistory->issued) ?></td>
            <td><?= h($licensehistory->license_no) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $licensehistory->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $licensehistory->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $licensehistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licensehistory->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
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
