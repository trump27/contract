<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Contractname'), ['action' => 'edit', $contractname->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contractname'), ['action' => 'delete', $contractname->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractname->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contractnames'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contractname'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Contractname'), ['action' => 'edit', $contractname->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contractname'), ['action' => 'delete', $contractname->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractname->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contractnames'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contractname'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($contractname->contract_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Contract Name') ?></td>
            <td><?= h($contractname->contract_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($contractname->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Contracts') ?></h3>
    </div>
    <?php if (!empty($contractname->contracts)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Contractname Id') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('File') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Size') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contractname->contracts as $contracts): ?>
                <tr>
                    <td><?= h($contracts->id) ?></td>
                    <td><?= h($contracts->client_id) ?></td>
                    <td><?= h($contracts->customer_id) ?></td>
                    <td><?= h($contracts->contractname_id) ?></td>
                    <td><?= h($contracts->remarks) ?></td>
                    <td><?= h($contracts->file) ?></td>
                    <td><?= h($contracts->dir) ?></td>
                    <td><?= h($contracts->size) ?></td>
                    <td><?= h($contracts->type) ?></td>
                    <td><?= h($contracts->user_id) ?></td>
                    <td><?= h($contracts->created) ?></td>
                    <td><?= h($contracts->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'view', $contracts->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'edit', $contracts->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Contracts</p>
    <?php endif; ?>
</div>
