<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit License'), ['action' => 'edit', $license->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete License'), ['action' => 'delete', $license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $license->id)]) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit License'), ['action' => 'edit', $license->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete License'), ['action' => 'delete', $license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $license->id)]) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Licenses') ?></h1>

<div class="bs-callout bs-callout-primary">
  <?= $this->Html->link('証書をWordで出力', ['action' => 'doc', $license->id],
      ['class' => 'btn btn-lg btn-primary', 'role' => 'button']); ?>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($license->license_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($license->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $license->has('client') ? $this->Html->link($license->client->client_name, ['controller' => 'Clients', 'action' => 'view', $license->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer') ?></td>
            <td><?= $license->has('customer') ? $this->Html->link($license->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $license->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Order') ?></td>
            <td><?= $license->has('order') ? $this->Html->link($license->order->product_name, ['controller' => 'Orders', 'action' => 'view', $license->order->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $license->has('condition') ? $this->Html->link($license->condition->name, ['controller' => 'Conditions', 'action' => 'view', $license->condition->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $license->has('status') ? $this->Html->link($license->status->name, ['controller' => 'Statuses', 'action' => 'view', $license->status->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('License No') ?></td>
            <td><?= h($license->license_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Relate No') ?></td>
            <td><?= h($license->relate_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($license->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('License Name') ?></td>
            <td><?= h($license->license_name) ?></td>
        </tr>
        <tr>
            <td><?= __('License Qty') ?></td>
            <td><?= $this->Number->format($license->license_qty) ?></td>
        </tr>
        <tr>
            <td><?= __('Language') ?></td>
            <td><?= $license->has('language') ? $this->Html->link($license->language->language_name, ['controller' => 'Languages', 'action' => 'view', $license->language->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Issued') ?></td>
            <td><?= h($license->issued) ?></td>
        </tr>
        <tr>
            <td><?= __('Startdate') ?></td>
            <td><?= h($license->startdate) ?></td>
        </tr>
        <tr>
            <td><?= __('Enddate') ?></td>
            <td><?= h($license->enddate) ?></td>
        </tr>
        <tr>
            <td><?= __('License Key') ?></td>
            <td><?= h($license->license_key) ?></td>
        </tr>
        <tr>
            <td><?= __('Notice') ?></td>
            <td><?= $this->Text->autoParagraph(h($license->notice)); ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= h($license->file) ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($license->dir) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($license->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($license->size) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $license->has('user') ? $this->Html->link($license->user->name, ['controller' => 'Users', 'action' => 'view', $license->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($license->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($license->modified) ?></td>
        </tr>
    </table>
</div>

