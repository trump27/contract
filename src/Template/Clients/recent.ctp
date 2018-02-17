<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=$this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']);?></li>
    <li><?=$this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']);?></li>
    <li><?=$this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']);?></li>
    <li><?=$this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']);?></li>
<?php $this->end();?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>');?>


<h1 class="page-header">Recent 10</h1>

<h2 class="page-header"><?=__('Orders')?></h2>
<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?=__('Actions');?></th>
            <!-- <th><?=$this->Paginator->sort('id');?></th> -->
            <!-- <th><?=$this->Paginator->sort('company_code');?></th> -->
            <th><?=$this->Paginator->sort('company_name1');?></th>
            <th><?=$this->Paginator->sort('status_msg');?></th>
            <th><?=$this->Paginator->sort('order_date');?></th>
            <th><?=$this->Paginator->sort('delivery_date');?></th>
            <th><?=$this->Paginator->sort('sales_date');?></th>
            <th><?=$this->Paginator->sort('product_name');?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>

            <td class="actions">
                <?=$this->Html->link('', ['controller' => 'Orders', 'action' => 'view', $order->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info'])?>
            </td>
            <!-- <td><?=$this->Number->format($order->id)?></td> -->
            <!-- <td><?=h($order->company_code)?></td> -->
            <td><?=$this->Html->link($this->my->trunc($order->company_name1), ['controller' => 'Clients', 'action' => 'view', $order->client->id])?></td>
            <td><?=h($order->status_msg)?></td>

            <td><?=h($order->order_date)?></td>
            <td><?=h($order->delivery_date)?></td>
            <td><?=h($order->sales_date)?></td>
            <td><?=h($order->product_name)?></td>

        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<!-- Contract -->
<h2 class="page-header"><?= __('Contract') ?></h2>
<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('contractname_id'); ?></th>
            <th><?= $this->Paginator->sort('file'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contracts as $contract): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'view', $contract->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <!-- <?= $this->Html->link('', ['action' => 'edit', $contract->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?> -->
                <!-- <?= $this->Form->postLink('', ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?> -->
            </td>
            <td><?= $this->Number->format($contract->id) ?></td>
            <td>
                <?= $contract->has('client') ? $this->Html->link($this->my->trunc($contract->client->client_name), ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?>
            </td>
            <td>
                <?= $contract->has('customer') ? $this->Html->link($this->my->trunc($contract->customer->customer_name), ['controller' => 'Customers', 'action' => 'view', $contract->customer->id]) : '' ?>
            </td>
            <td>
                <?= $contract->has('contractname') ? $this->Html->link($contract->contractname->contract_name, ['controller' => 'Contractnames', 'action' => 'view', $contract->contractname->id]) : '' ?>
            </td>
            <!-- <td><?= h($contract->file) ?></td> -->
            <!-- <td><?= $this->Html->link(urldecode ($contract->file) , str_replace(
                'webroot', '',
                str_replace('\\','/',$contract->dir ).urlencode($contract->file) )) ?></td> -->

            <td><?= $this->My->downloadlink($contract) ?></td>
            <td><?= h($contract->modified) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Licenses -->
<h2 class="page-header"><?= __('Licenses') ?></h2>
<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('status_id'); ?></th>
            <th><?= $this->Paginator->sort('issued'); ?></th>
            <th><?= $this->Paginator->sort('license_no'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($licenses as $license): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'view', $license->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
            </td>
            <td><?= $this->Number->format($license->id) ?></td>
            <td>
                <?= $license->has('client') ? $this->Html->link($this->my->trunc($license->client->client_name), ['controller' => 'Clients', 'action' => 'view', $license->client->id]) : '' ?>
            </td>
            <td>
                <?= $license->has('customer') ? $this->Html->link($this->my->trunc($license->customer->customer_name), ['controller' => 'Customers', 'action' => 'view', $license->customer->id]) : '' ?>
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
