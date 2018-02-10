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
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
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
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
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
            <td><?= __('Company Code') ?></td>
            <td><?= h($client->company_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Identity1') ?></td>
            <td><?= h($client->identity1) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Partner Flag') ?></td>
            <td><?= $this->Number->format($client->partner_flag) ?></td>
        </tr>
        <tr>
            <td><?= __('Remarks') ?></td>
            <td><?= $this->Text->autoParagraph(h($client->remarks)); ?></td>
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
                <th><?= __('Address') ?></th>
                <th><?= __('Identity2') ?></th>
                <th><?= __('Sales Dept') ?></th>
                <th><?= __('Sales Staff') ?></th>
                <th><?= __('Remarks') ?></th>
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
                    <td><?= h($customers->address) ?></td>
                    <td><?= h($customers->identity2) ?></td>
                    <td><?= h($customers->sales_dept) ?></td>
                    <td><?= h($customers->sales_staff) ?></td>
                    <td><?= h($customers->remarks) ?></td>
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
        <h3 class="panel-title"><?= __('Related Licenses') ?></h3>
    </div>
    <?php if (!empty($client->licenses)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Status Id') ?></th>
                <th><?= __('Issued') ?></th>
                <th><?= __('License No') ?></th>
                <th><?= __('Relate No') ?></th>
                <th><?= __('Product Name') ?></th>
                <th><?= __('License Name') ?></th>
                <th><?= __('Language') ?></th>
                <th><?= __('License Qty') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Enddate') ?></th>
                <th><?= __('License Key') ?></th>
                <th><?= __('Notice') ?></th>
                <th><?= __('File') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->licenses as $licenses): ?>
                <tr>
                    <td><?= h($licenses->id) ?></td>
                    <td><?= h($licenses->client_id) ?></td>
                    <td><?= h($licenses->customer_id) ?></td>
                    <td><?= h($licenses->order_id) ?></td>
                    <td><?= h($licenses->status_id) ?></td>
                    <td><?= h($licenses->issued) ?></td>
                    <td><?= h($licenses->license_no) ?></td>
                    <td><?= h($licenses->relate_no) ?></td>
                    <td><?= h($licenses->product_name) ?></td>
                    <td><?= h($licenses->license_name) ?></td>
                    <td><?= h($licenses->language) ?></td>
                    <td><?= h($licenses->license_qty) ?></td>
                    <td><?= h($licenses->startdate) ?></td>
                    <td><?= h($licenses->enddate) ?></td>
                    <td><?= h($licenses->license_key) ?></td>
                    <td><?= h($licenses->notice) ?></td>
                    <td><?= h($licenses->file) ?></td>
                    <td><?= h($licenses->dir) ?></td>
                    <td><?= h($licenses->size) ?></td>
                    <td><?= h($licenses->type) ?></td>
                    <td><?= h($licenses->created) ?></td>
                    <td><?= h($licenses->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'view', $licenses->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'edit', $licenses->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Licenses', 'action' => 'delete', $licenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licenses->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Licenses</p>
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
                <th><?= __('Company Code') ?></th>
                <th><?= __('Company Name1') ?></th>
                <th><?= __('Company Name2') ?></th>
                <th><?= __('Order Date') ?></th>
                <th><?= __('Order No') ?></th>
                <th><?= __('Order Detail No') ?></th>
                <th><?= __('Purchase No') ?></th>
                <th><?= __('Delivery Date') ?></th>
                <th><?= __('Sales Date') ?></th>
                <th><?= __('Status Msg') ?></th>
                <th><?= __('Product Category') ?></th>
                <th><?= __('Product Code') ?></th>
                <th><?= __('Product Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Sales Dept') ?></th>
                <th><?= __('Sales Staff') ?></th>
                <th><?= __('File') ?></th>
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
                    <td><?= h($orders->company_code) ?></td>
                    <td><?= h($orders->company_name1) ?></td>
                    <td><?= h($orders->company_name2) ?></td>
                    <td><?= h($orders->order_date) ?></td>
                    <td><?= h($orders->order_no) ?></td>
                    <td><?= h($orders->order_detail_no) ?></td>
                    <td><?= h($orders->purchase_no) ?></td>
                    <td><?= h($orders->delivery_date) ?></td>
                    <td><?= h($orders->sales_date) ?></td>
                    <td><?= h($orders->status_msg) ?></td>
                    <td><?= h($orders->product_category) ?></td>
                    <td><?= h($orders->product_code) ?></td>
                    <td><?= h($orders->product_name) ?></td>
                    <td><?= h($orders->quantity) ?></td>
                    <td><?= h($orders->price) ?></td>
                    <td><?= h($orders->sales_dept) ?></td>
                    <td><?= h($orders->sales_staff) ?></td>
                    <td><?= h($orders->file) ?></td>
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
