<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New License'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Licenses') ?></h1>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('condition_id', ['label' => __('Conditions').'　', 'empty' => '---']);
echo $this->Form->input('client_name', ['label' => '　' . __('Client Name') . '　', 'size' => 10]);
echo $this->Form->input('customer_name', ['label' => '　' . __('Customer Name') . '　', 'size' => 10]);
echo $this->Form->input('license_no', ['label' => '　'.__('License No').'　', 'size' => 10]);

echo $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn-primary']);
echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-success', 'role' => 'button']);
echo $this->Form->end();
?>
<div>&nbsp;</div>

<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('license_name'); ?></th>
            <th><?= $this->Paginator->sort('condition_id'); ?></th>
            <th><?= $this->Paginator->sort('status_id'); ?></th>
            <th><?= $this->Paginator->sort('issued'); ?></th>
            <th><?= $this->Paginator->sort('license_no'); ?></th>
            <th><?= $this->Paginator->sort('license_qty'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($licenses as $license): ?>
        <tr>

            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $license->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $license->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $license->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td align="right"><?= $this->Number->format($license->id) ?></td>
            <td>
                <?= $license->has('client') ? $this->Html->link($this->my->trunc($license->client->client_name), ['controller' => 'Clients', 'action' => 'view', $license->client->id]) : '' ?>
            </td>
            <td>
                <?= $license->has('customer') ? $this->Html->link($this->my->trunc($license->customer->customer_name), ['controller' => 'Customers', 'action' => 'view', $license->customer->id]) : '' ?>
            </td>
            <td>
                <?= h($license->license_name) ?>
            </td>
            <td>
                <?= $license->has('condition') ? $license->condition->name : '' ?>
            </td>
            <td>
                <?= $license->has('status') ? $this->Html->link($license->status->name, ['controller' => 'Statuses', 'action' => 'view', $license->status->id]) : '' ?>
            </td>
            <td><?= h($license->issued) ?></td>
            <td><?= h($license->license_no) ?></td>
            <td align="right"><?= h($license->license_qty) ?></td>
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
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
