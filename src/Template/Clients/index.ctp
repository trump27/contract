<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Client'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Clients') ?></h1>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('client_name', ['label' => __('Client Name').'　', 'size'=>10]);
echo $this->Form->control('partner_flag', ['type' => 'select',
    'options' => [0 => 'No', 1 => 'Yes'],
    'empty' => '---', 'label' => '　'.__('Partner Flag').'　'
    ]);
echo $this->Form->input('partner_id', ['label'=>'　パートナー名　', 'empty'=>'---']);
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
            <th><?= $this->Paginator->sort('client_name'); ?></th>
            <!-- <th><?= $this->Paginator->sort('company_code'); ?></th> -->
            <th><?= $this->Paginator->sort('identity1'); ?></th>
            <th><?= $this->Paginator->sort('partner_flag'); ?></th>
            <th><?= $this->Paginator->sort('partner_id'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>

            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $client->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $client->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td align="right"><?= $this->Number->format($client->id) ?></td>
            <td><?= $this->my->trunc($client->client_name) ?></td>
            <!-- <td><?= h($client->company_code) ?></td> -->
            <td><?= h($client->identity1) ?></td>
            <td><?= $this->My->partner($client->partner_flag) ?></td>
            <td>
                <?= $client->has('partner') ? $this->Html->link($this->my->trunc($client->partner->client_name), ['controller' => 'Clients', 'action' => 'view', $client->partner->id]) : '' ?>
            </td>
            <td><?= h($client->modified) ?></td>
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
