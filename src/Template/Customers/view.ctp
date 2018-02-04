<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Licensehistories'), ['controller' => 'Licensehistories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Licensehistory'), ['controller' => 'Licensehistories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Licensehistories'), ['controller' => 'Licensehistories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Licensehistory'), ['controller' => 'Licensehistories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($customer->customer_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $customer->has('client') ? $this->Html->link($customer->client->client_name, ['controller' => 'Clients', 'action' => 'view', $customer->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer Name') ?></td>
            <td><?= h($customer->customer_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Admin Name1') ?></td>
            <td><?= h($customer->admin_name1) ?></td>
        </tr>
        <tr>
            <td><?= __('Div1') ?></td>
            <td><?= h($customer->div1) ?></td>
        </tr>
        <tr>
            <td><?= __('Mail1') ?></td>
            <td><?= h($customer->mail1) ?></td>
        </tr>
        <tr>
            <td><?= __('Admin Name2') ?></td>
            <td><?= h($customer->admin_name2) ?></td>
        </tr>
        <tr>
            <td><?= __('Div2') ?></td>
            <td><?= h($customer->div2) ?></td>
        </tr>
        <tr>
            <td><?= __('Mail2') ?></td>
            <td><?= h($customer->mail2) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Notice') ?></td>
            <td><?= $this->Text->autoParagraph(h($customer->notice)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Licensehistories') ?></h3>
    </div>
    <?php if (!empty($customer->licensehistories)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('License No') ?></th>
                <th><?= __('Issued') ?></th>
                <th><?= __('Status Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('License Name') ?></th>
                <th><?= __('License Qty') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Enddate') ?></th>
                <th><?= __('Notice') ?></th>
                <th><?= __('Application') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customer->licensehistories as $licensehistories): ?>
                <tr>
                    <td><?= h($licensehistories->id) ?></td>
                    <td><?= h($licensehistories->license_no) ?></td>
                    <td><?= h($licensehistories->issued) ?></td>
                    <td><?= h($licensehistories->status_id) ?></td>
                    <td><?= h($licensehistories->customer_id) ?></td>
                    <td><?= h($licensehistories->order_id) ?></td>
                    <td><?= h($licensehistories->license_name) ?></td>
                    <td><?= h($licensehistories->license_qty) ?></td>
                    <td><?= h($licensehistories->startdate) ?></td>
                    <td><?= h($licensehistories->enddate) ?></td>
                    <td><?= h($licensehistories->notice) ?></td>
                    <td><?= h($licensehistories->application) ?></td>
                    <td><?= h($licensehistories->dir) ?></td>
                    <td><?= h($licensehistories->size) ?></td>
                    <td><?= h($licensehistories->type) ?></td>
                    <td><?= h($licensehistories->created) ?></td>
                    <td><?= h($licensehistories->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Licensehistories', 'action' => 'view', $licensehistories->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Licensehistories', 'action' => 'edit', $licensehistories->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Licensehistories', 'action' => 'delete', $licensehistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licensehistories->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Licensehistories</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Licenses') ?></h3>
    </div>
    <?php if (!empty($customer->licenses)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('License No') ?></th>
                <th><?= __('Issued') ?></th>
                <th><?= __('Status Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('License Name') ?></th>
                <th><?= __('License Qty') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Enddate') ?></th>
                <th><?= __('Notice') ?></th>
                <th><?= __('Application') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customer->licenses as $licenses): ?>
                <tr>
                    <td><?= h($licenses->id) ?></td>
                    <td><?= h($licenses->license_no) ?></td>
                    <td><?= h($licenses->issued) ?></td>
                    <td><?= h($licenses->status_id) ?></td>
                    <td><?= h($licenses->customer_id) ?></td>
                    <td><?= h($licenses->order_id) ?></td>
                    <td><?= h($licenses->license_name) ?></td>
                    <td><?= h($licenses->license_qty) ?></td>
                    <td><?= h($licenses->startdate) ?></td>
                    <td><?= h($licenses->enddate) ?></td>
                    <td><?= h($licenses->notice) ?></td>
                    <td><?= h($licenses->application) ?></td>
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
