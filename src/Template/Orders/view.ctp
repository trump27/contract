<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Orders') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($order->product_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $order->has('client') ? $this->Html->link($order->client->client_name, ['controller' => 'Clients', 'action' => 'view', $order->client->id]) : $order->company_code ?></td>
        </tr>
        <tr>
            <td><?= __('Company Name1') ?></td>
            <td><?= h($order->company_name1) ?></td>
        </tr>
        <tr>
            <td><?= __('Company Name2') ?></td>
            <td><?= h($order->company_name2) ?></td>
        </tr>
        <tr>
            <td><?= __('Order No') ?></td>
            <td><?= h($order->order_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Order Detail No') ?></td>
            <td><?= h($order->order_detail_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Purchase No') ?></td>
            <td><?= h($order->purchase_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Status Msg') ?></td>
            <td><?= h($order->status_msg) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Category') ?></td>
            <td><?= h($order->product_category) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Code') ?></td>
            <td><?= h($order->product_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($order->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($order->quantity) ?></td>
        </tr>
        <tr>
            <td><?= __('Price') ?></td>
            <td><?= $this->Number->format($order->price) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $order->has('status') ? $this->Html->link($order->status->name, ['controller' => 'Statuses', 'action' => 'view', $order->status->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Dept') ?></td>
            <td><?= h($order->sales_dept) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Staff') ?></td>
            <td><?= h($order->sales_staff) ?></td>
        </tr>
        <tr>
            <td><?= __('Order Date') ?></td>
            <td><?= h($order->order_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Orderym') ?></td>
            <td><?= h($order->orderym) ?></td>
        </tr>
        <tr>
            <td><?= __('Delivery Date') ?></td>
            <td><?= h($order->delivery_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Date') ?></td>
            <td><?= h($order->sales_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Detail') ?></td>
            <td><?= $this->Text->autoParagraph(h($order->product_detail)); ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= h($order->file) ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($order->dir) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($order->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($order->size) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : $order->user_id ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
</div>
