<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Order'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Orders') ?></h1>
<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('company_code'); ?></th>
            <th><?= $this->Paginator->sort('company_name1'); ?></th>
            <th><?= $this->Paginator->sort('company_name2'); ?></th>
            <th><?= $this->Paginator->sort('order_no'); ?></th>
            <th><?= $this->Paginator->sort('order_date'); ?></th>
            <th><?= $this->Paginator->sort('delivery_date'); ?></th>
            <th><?= $this->Paginator->sort('sales_date'); ?></th>
            <th><?= $this->Paginator->sort('product_name'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $order->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <!-- <?= $this->Html->link('', ['action' => 'edit', $order->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?> -->
                <!-- <?= $this->Form->postLink('', ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?> -->
            </td>
            <td align="right"><?= $this->Number->format($order->id) ?></td>
            <td>
                <?= $order->has('client') ? $this->Html->link($this->my->trunc($order->client->company_code), ['controller' => 'Clients', 'action' => 'view', $order->client->id]) : '' ?>
            </td>
            <td><?= h($this->my->trunc($order->company_name1)) ?></td>
            <td><?= h($this->my->trunc($order->company_name2)) ?></td>
            <td><?= $order->order_no .'-'.$order->order_detail_no ?></td>
            <td><?= h($order->order_date) ?></td>
            <td><?= h($order->delivery_date) ?></td>
            <td><?= h($order->sales_date) ?></td>
            <td><?= h($order->product_name) ?></td>
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
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
