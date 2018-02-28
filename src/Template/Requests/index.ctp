<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Request'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Request') ?></h1>
<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('appform_id'); ?></th>
            <th><?= $this->Paginator->sort('status_id'); ?></th>
            <th><?= $this->Paginator->sort('product_name'); ?></th>
            <th><?= $this->Paginator->sort('license_name'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requests as $request): ?>
        <tr>

            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $request->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $request->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td><?= $this->Number->format($request->id) ?></td>
            <td>
                <?= $request->has('client') ? $this->Html->link($this->My->trunc($request->client->client_name), ['controller' => 'Clients', 'action' => 'view', $request->client->id]) : '' ?>
            </td>
            <td>
                <?= $request->has('customer') ? $this->Html->link($request->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $request->customer->id]) : '' ?>
            </td>
            <td>
                <?= $request->has('appform') ? $this->Html->link($request->appform->form_name, ['controller' => 'Appforms', 'action' => 'view', $request->appform->id]) : '' ?>
            </td>
            <td>
                <?= $request->has('status') ? $this->Html->link($request->status->name, ['controller' => 'Statuses', 'action' => 'view', $request->status->id]) : '' ?>
            </td>
            <td><?= h($request->product_name) ?></td>
            <td><?= h($request->license_name) ?></td>
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
    <p><?= $this->Paginator->counter() ?></p>
</div>
