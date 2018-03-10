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

<h1 class="page-header"><?= __('Requests') ?></h1>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('status_id', ['label' => __('Status Id') . '　', 'empty' => '---']);
echo $this->Form->input('client_name', ['label' => '　' . __('Client Name') . '　', 'size' => 10]);
echo $this->Form->input('license_name', ['label' => '　' . __('License Name') . '　', 'size' => 10]);

echo $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn-primary']);
echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-success', 'role' => 'button']);
echo $this->Form->end();
?>
<div>&nbsp;</div>

<table class="table table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
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
        <tr class="<?=!empty($request->client->partner_id)?'active':''?>">

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
