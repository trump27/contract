<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Supportcontract'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Supportcontract') ?></h1>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('q', ['label' => '契約先／最終顧客　']);
echo $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn-primary']);
// if (!empty($_isSearch)) {
echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-success', 'role' => 'button']);
// }
echo $this->Form->end();
?>
<div>&nbsp;</div>

<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <!-- <th><?= $this->Paginator->sort('company_code'); ?></th> -->
            <th><?= $this->Paginator->sort('contractor'); ?></th>
            <!-- <th><?= $this->Paginator->sort('eu_company_code'); ?></th> -->
            <th><?= $this->Paginator->sort('eu_name'); ?></th>
            <th><?= $this->Paginator->sort('category'); ?></th>
            <th><?= $this->Paginator->sort('contract_no'); ?></th>
            <th><?= $this->Paginator->sort('product_name'); ?></th>
            <th><?= $this->Paginator->sort('startdate'); ?></th>
            <th><?= $this->Paginator->sort('enddate'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($supportcontracts as $supportcontract): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $supportcontract->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <!-- <?= $this->Html->link('', ['action' => 'edit', $supportcontract->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?> -->
                <!-- <?= $this->Form->postLink('', ['action' => 'delete', $supportcontract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supportcontract->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?> -->
            </td>
            <td><?= $this->Number->format($supportcontract->id) ?></td>
            <!-- <td><?= h($supportcontract->company_code) ?></td> -->
            <td>
                <?= $this->my->trunc($supportcontract->contractor) ?>
            </td>
            <!-- <td><?= h($supportcontract->eu_company_code) ?></td> -->
            <td>
                <?= $supportcontract->has('client') ? $this->Html->link($this->my->trunc($supportcontract->eu_name), ['controller' => 'Clients', 'action' => 'view', $supportcontract->client->id]) : $this->my->trunc($supportcontract->eu_name) ?>
            </td>
            <td><?= $this->my->trunc($supportcontract->category) ?></td>
            <td><?= $this->my->trunc($supportcontract->product_name) ?></td>
            <td><?= h($supportcontract->contract_no) ?></td>
            <td><?= h($supportcontract->startdate) ?></td>
            <td><?= h($supportcontract->enddate) ?></td>
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
