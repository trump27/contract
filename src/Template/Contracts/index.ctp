<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Contract'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Contract') ?></h1>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('client_name', ['label' => __('Client Name').'　']);
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
            <!-- <th><?= $this->Paginator->sort('customer_id'); ?></th> -->
            <th><?= $this->Paginator->sort('contractname_id'); ?></th>
            <th><?= $this->Paginator->sort('contract_date'); ?></th>
            <th><?= $this->Paginator->sort('status_id'); ?></th>
            <!-- <th><?= $this->Paginator->sort('file'); ?></th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contracts as $contract): ?>
        <tr class="<?=!empty($contract->client->partner_id)?'active':''?>">

            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $contract->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $contract->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <!-- <?= $this->Form->postLink('', ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?> -->
                <?php
                if (!empty($contract->file))
                    echo $this->Html->link('', $this->My->dllink($contract), ['title' => urldecode($contract->file), 'target'=>'_blank', 'class' => 'btn btn-default btn-xs glyphicon glyphicon-file alert-warning']);
                ?>
            </td>
            <td align="right"><?= $this->Number->format($contract->id) ?></td>
            <td>
                <?= $contract->has('client') ? $this->Html->link($this->my->trunc($contract->client->client_name,15), ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?>
            </td>
            <!-- <td>
                <?= $contract->has('customer') ? $this->Html->link($this->my->trunc($contract->customer->customer_name), ['controller' => 'Customers', 'action' => 'view', $contract->customer->id]) : '' ?>
            </td> -->
            <td>
                <?= $contract->has('contractname') ? $this->Html->link($this->my->trunc($contract->contractname->contract_name), ['controller' => 'Contractnames', 'action' => 'view', $contract->contractname->id]) : '' ?>
            </td>
            <td><?= h($contract->contract_date) ?></td>
            <td><?= $contract->has('status') ? h($contract->status->name) : $contract->status_id ?></td>

            <!-- <td><?= h($contract->file) ?></td> -->
            <!-- <td><?= $this->Html->link(urldecode ($contract->file) , str_replace(
                'webroot', '',
                str_replace('\\','/',$contract->dir ).urlencode($contract->file) )) ?></td> -->

            <!-- <td><?= $this->My->downloadlink($contract) ?></td> -->
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
