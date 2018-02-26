<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?> </li>
<li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?> </li>
<li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Request') ?></h1>

<div class="bs-callout bs-callout-primary">
  <?= $this->Html->link('申込書をWordで出力', ['action' => 'doc', $request->id],
      ['class' => 'btn btn-lg btn-primary', 'role' => 'button']); ?>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($request->license_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($request->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $request->has('client') ? $this->Html->link($request->client->client_name, ['controller' => 'Clients', 'action' => 'view', $request->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer') ?></td>
            <td><?= $request->has('customer') ? $this->Html->link($request->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $request->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Appform') ?></td>
            <td><?= $request->has('appform') ? $this->Html->link($request->appform->form_name, ['controller' => 'Appforms', 'action' => 'view', $request->appform->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $request->has('status') ? $this->Html->link($request->status->name, ['controller' => 'Statuses', 'action' => 'view', $request->status->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($request->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('License Name') ?></td>
            <td><?= h($request->license_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Language') ?></td>
            <td><?= $request->has('language') ? $this->Html->link($request->language->language_name, ['controller' => 'Languages', 'action' => 'view', $request->language->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('License Qty') ?></td>
            <td><?= $this->Number->format($request->license_qty).' ライセンスパック' ?></td>
        </tr>
        <tr>
            <td><?= __('License Date') ?></td>
            <td><?= h($request->license_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Startsupp Date') ?></td>
            <td><?= h($request->startsupp_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Notice') ?></td>
            <td><?= $this->Text->autoParagraph(h($request->notice)); ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $request->has('user') ? $this->Html->link($request->user->name, ['controller' => 'Users', 'action' => 'view', $request->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($request->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($request->modified) ?></td>
        </tr>
    </table>
</div>

