<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($client->client_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Client Name') ?></td>
            <td><?= h($client->client_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Dept') ?></td>
            <td><?= h($client->sales_dept) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Staff') ?></td>
            <td><?= h($client->sales_staff) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Notice') ?></td>
            <td><?= $this->Text->autoParagraph(h($client->notice)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Customers') ?></h3>
    </div>
    <?php if (!empty($client->customers)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Customer Name') ?></th>
                <th><?= __('Notice') ?></th>
                <th><?= __('Admin Name1') ?></th>
                <th><?= __('Div1') ?></th>
                <th><?= __('Mail1') ?></th>
                <th><?= __('Admin Name2') ?></th>
                <th><?= __('Div2') ?></th>
                <th><?= __('Mail2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->customers as $customers): ?>
                <tr>
                    <td><?= h($customers->id) ?></td>
                    <td><?= h($customers->client_id) ?></td>
                    <td><?= h($customers->customer_name) ?></td>
                    <td><?= h($customers->notice) ?></td>
                    <td><?= h($customers->admin_name1) ?></td>
                    <td><?= h($customers->div1) ?></td>
                    <td><?= h($customers->mail1) ?></td>
                    <td><?= h($customers->admin_name2) ?></td>
                    <td><?= h($customers->div2) ?></td>
                    <td><?= h($customers->mail2) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Customers', 'action' => 'view', $customers->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Customers', 'action' => 'edit', $customers->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Customers</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Orders') ?></h3>
    </div>
    <?php if (!empty($client->orders)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Order Date') ?></th>
                <th><?= __('Product Code') ?></th>
                <th><?= __('Order Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Amount Money') ?></th>
                <th><?= __('Sales Dept') ?></th>
                <th><?= __('Sales Staff') ?></th>
                <th><?= __('Proof') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->orders as $orders): ?>
                <tr>
                    <td><?= h($orders->id) ?></td>
                    <td><?= h($orders->client_id) ?></td>
                    <td><?= h($orders->order_date) ?></td>
                    <td><?= h($orders->product_code) ?></td>
                    <td><?= h($orders->order_name) ?></td>
                    <td><?= h($orders->quantity) ?></td>
                    <td><?= h($orders->amount_money) ?></td>
                    <td><?= h($orders->sales_dept) ?></td>
                    <td><?= h($orders->sales_staff) ?></td>
                    <td><?= h($orders->proof) ?></td>
                    <td><?= h($orders->dir) ?></td>
                    <td><?= h($orders->size) ?></td>
                    <td><?= h($orders->type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Orders', 'action' => 'view', $orders->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Orders', 'action' => 'edit', $orders->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Orders</p>
    <?php endif; ?>
</div>
