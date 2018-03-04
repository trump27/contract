<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Customers') ?></h1>
<div class="alert alert-info" role="alert">網掛けが再販先</div>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('client_name', ['label' => __('Client Name').'　']);
echo $this->Form->input('customer_name', ['label' => '　'.__('Customer Name').'　']);
echo $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn-primary']);
// if (!empty($_isSearch)) {
echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-success', 'role' => 'button']);
// }
echo $this->Form->end();
?>
<div>&nbsp;</div>

<table class="table table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('customer_name'); ?></th>
            <!-- <th><?= $this->Paginator->sort('address'); ?></th> -->
            <th><?= $this->Paginator->sort('identity2'); ?></th>
            <th><?= $this->Paginator->sort('division'); ?></th>
            <th><?= $this->Paginator->sort('sales_staff'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
        <tr class="<?=$customer->client->partner_id?'active':''?>">

            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $customer->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $customer->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td align="right"><?= $this->Number->format($customer->id) ?></td>
            <td title="<?=$customer->client->client_name?>">
                <?= $customer->has('client') ? $this->Html->link($this->my->trunc($customer->client->client_name), ['controller' => 'Clients', 'action' => 'view', $customer->client->id]) : '' ?>
            </td>
            <td><?= h($this->my->trunc($customer->customer_name)) ?></td>
            <!-- <td><?= h($this->my->trunc($customer->address)) ?></td> -->
            <td><?= h($customer->identity2) ?></td>
            <td title="<?=$customer->division?>"><?= $this->my->trunc($customer->division) ?></td>
            <td><?= h($customer->sales_staff) ?></td>
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
