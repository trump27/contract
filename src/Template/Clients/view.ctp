<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Clients') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($client->client_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
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
            <td><?= __('Partner Flag') ?></td>
            <td><?= $this->My->partner($client->partner_flag) ?></td>
        </tr>
        <tr>
            <td><?= __('Partner') ?></td>
            <td><?= $client->has('partner') ? $this->Html->link($client->partner->client_name, ['controller' => 'Clients', 'action' => 'view', $client->partner->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Remarks') ?></td>
            <td><?= $this->Text->autoParagraph(h($client->remarks)); ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $client->has('user') ? $this->Html->link($client->user->name, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($client->modified) ?></td>
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
                <th><?= __('Customer Name') ?></th>
                <th><?= __('Identity2') ?></th>
                <th><?= __('Sales Dept') ?></th>
                <th><?= __('Sales Staff') ?></th>
                <th><?= __('Admin Name1') ?></th>
                <th><?= __('Admin Name2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->customers as $customers): ?>
                <tr>
                    <td align="right"><?= h($customers->id) ?></td>
                    <td><?= $this->My->trunc($customers->customer_name) ?></td>
                    <td><?= h($customers->identity2) ?></td>
                    <td><?= $this->My->trunc($customers->sales_dept) ?></td>
                    <td><?= h($customers->sales_staff) ?></td>
                    <td><?= h($customers->admin_name1) ?></td>
                    <td><?= h($customers->admin_name2) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Customers', 'action' => 'view', $customers->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Customers', 'action' => 'edit', $customers->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <!-- <?= $this->Form->postLink('', ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?> -->
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
        <h3 class="panel-title"><?= __('Related Contracts') ?></h3>
    </div>
    <?php if (!empty($client->contracts)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <!-- <th><?= __('Client Id') ?></th> -->
                <!-- <th><?= __('Customer Id') ?></th> -->
                <!-- <th><?= __('Contractname Id') ?></th> -->
                <!-- <th><?= __('Remarks') ?></th> -->
                <th><?= __('Contract Date') ?></th>
                <th><?= __('File') ?></th>
                <!-- <th><?= __('Dir') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th> -->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->contracts as $contracts): ?>
                <tr>
                    <td align="right"><?= h($contracts->id) ?></td>
                    <!-- <td><?= h($contracts->client_id) ?></td> -->
                    <!-- <td><?= h($contracts->customer_id) ?></td> -->
                    <!-- <td><?= h($contracts->contractname_id) ?></td> -->
                    <!-- <!-- <td><?= h($contracts->remarks) ?></td> -->
                    <td><?= h($contracts->contract_date) ?></td>
                    <td><?= h($contracts->file) ?></td>
                    <!-- <td><?= h($contracts->dir) ?></td>
                    <td><?= h($contracts->size) ?></td>
                    <td><?= h($contracts->type) ?></td>
                    <td><?= h($contracts->user_id) ?></td>
                    <td><?= h($contracts->created) ?></td>
                    <td><?= h($contracts->modified) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'view', $contracts->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'edit', $contracts->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <!-- <?= $this->Form->postLink('', ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Contracts</p>
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
                <!-- <th><?= __('Company Code') ?></th> -->
                <th><?= __('Company Name1') ?></th>
                <th><?= __('Order Date') ?></th>
                <th><?= __('Status Msg') ?></th>
                <th><?= __('Product Category') ?></th>
                <!-- <th><?= __('Product Code') ?></th> -->
                <th><?= __('Product Name') ?></th>
                <th><?= __('Sales Dept') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->orders as $orders): ?>
                <tr>
                    <td align="right"><?= h($orders->id) ?></td>
                    <!-- <td><?= h($orders->company_code) ?></td> -->
                    <td><?= $this->My->trunc($orders->company_name1) ?></td>
                    <td><?= h($orders->order_date) ?></td>
                    <td><?= h($orders->status_msg) ?></td>
                    <td><?= $this->My->trunc($orders->product_category) ?></td>
                    <!-- <td><?= h($orders->product_code) ?></td> -->
                    <td><?= $this->My->trunc($orders->product_name) ?></td>
                    <td><?= h($orders->sales_dept) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Orders', 'action' => 'view', $orders->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <!-- <?= $this->Html->link('', ['controller' => 'Orders', 'action' => 'edit', $orders->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?> -->
                        <!-- <?= $this->Form->postLink('', ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Orders</p>
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
                <th><?= __('Product Name') ?></th>
                <th><?= __('License Name') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Enddate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->licenses as $licenses): ?>
                <tr>
                    <td align="right"><?= h($licenses->id) ?></td>
                    <td><?= $this->My->trunc($licenses->product_name) ?></td>
                    <td><?= $this->My->trunc($licenses->license_name) ?></td>
                    <td><?= h($licenses->startdate) ?></td>
                    <td><?= h($licenses->enddate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'view', $licenses->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'edit', $licenses->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
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
        <h3 class="panel-title"><?= __('Related Licensehistories') ?></h3>
    </div>
    <?php if (!empty($client->licensehistories)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Name') ?></th>
                <th><?= __('License Name') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Enddate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->licensehistories as $licensehistories): ?>
                <tr>
                    <td align="right"><?= h($licensehistories->id) ?></td>
                    <td><?= $this->My->trunc($licensehistories->product_name) ?></td>
                    <td><?= $this->My->trunc($licensehistories->license_name) ?></td>
                    <td><?= h($licensehistories->startdate) ?></td>
                    <td><?= h($licensehistories->enddate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Licensehistories', 'action' => 'view', $licensehistories->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Licensehistories', 'action' => 'edit', $licensehistories->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <!-- <?= $this->Form->postLink('', ['controller' => 'Licensehistories', 'action' => 'delete', $licensehistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licensehistories->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Licensehistories</p>
    <?php endif; ?>
</div>