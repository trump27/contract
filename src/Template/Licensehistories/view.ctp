<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Licensehistory'), ['action' => 'edit', $licensehistory->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Licensehistory'), ['action' => 'delete', $licensehistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licensehistory->id)]) ?> </li>
<li><?= $this->Html->link(__('List Licensehistories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Licensehistory'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Licensehistory'), ['action' => 'edit', $licensehistory->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Licensehistory'), ['action' => 'delete', $licensehistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licensehistory->id)]) ?> </li>
<li><?= $this->Html->link(__('List Licensehistories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Licensehistory'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($licensehistory->license_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $licensehistory->has('client') ? $this->Html->link($licensehistory->client->client_name, ['controller' => 'Clients', 'action' => 'view', $licensehistory->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer') ?></td>
            <td><?= $licensehistory->has('customer') ? $this->Html->link($licensehistory->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $licensehistory->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Order') ?></td>
            <td><?= $licensehistory->has('order') ? $this->Html->link($licensehistory->order->product_name, ['controller' => 'Orders', 'action' => 'view', $licensehistory->order->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $licensehistory->has('status') ? $this->Html->link($licensehistory->status->name, ['controller' => 'Statuses', 'action' => 'view', $licensehistory->status->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('License No') ?></td>
            <td><?= h($licensehistory->license_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Relate No') ?></td>
            <td><?= h($licensehistory->relate_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($licensehistory->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('License Name') ?></td>
            <td><?= h($licensehistory->license_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Language') ?></td>
            <td><?= $licensehistory->has('language') ? $this->Html->link($licensehistory->language->language_name, ['controller' => 'Languages', 'action' => 'view', $licensehistory->language->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('License Key') ?></td>
            <td><?= h($licensehistory->license_key) ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= h($licensehistory->file) ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($licensehistory->dir) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($licensehistory->type) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $licensehistory->has('user') ? $this->Html->link($licensehistory->user->name, ['controller' => 'Users', 'action' => 'view', $licensehistory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($licensehistory->id) ?></td>
        </tr>
        <tr>
            <td><?= __('License Qty') ?></td>
            <td><?= $this->Number->format($licensehistory->license_qty) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($licensehistory->size) ?></td>
        </tr>
        <tr>
            <td><?= __('Issued') ?></td>
            <td><?= h($licensehistory->issued) ?></td>
        </tr>
        <tr>
            <td><?= __('Startdate') ?></td>
            <td><?= h($licensehistory->startdate) ?></td>
        </tr>
        <tr>
            <td><?= __('Enddate') ?></td>
            <td><?= h($licensehistory->enddate) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($licensehistory->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($licensehistory->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Notice') ?></td>
            <td><?= $this->Text->autoParagraph(h($licensehistory->notice)); ?></td>
        </tr>
    </table>
</div>

