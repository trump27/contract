<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Customers') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($customer->customer_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $customer->has('client') ? $this->Html->link($customer->client->client_name, ['controller' => 'Clients', 'action' => 'view', $customer->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer Name') ?></td>
            <td><?= h($customer->customer_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Division') ?></td>
            <td><?= h($customer->division) ?></td>
        </tr>
        <tr>
            <td><?= __('Identity2') ?></td>
            <td><?= h($customer->identity2) ?></td>
        </tr>
        <tr>
            <td><?= __('Address') ?></td>
            <td><?= h($customer->address) ?></td>
        </tr>
        <tr>
            <td><?= __('Remarks') ?></td>
            <td><?= $this->Text->autoParagraph(h($customer->remarks)); ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Dept') ?></td>
            <td><?= h($customer->sales_dept) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Staff') ?></td>
            <td><?= h($customer->sales_staff) ?></td>
        </tr>
        <tr>
            <td><?= __('Admin Name1') ?></td>
            <td><?= h($customer->admin_name1) ?></td>
        </tr>
        <tr>
            <td><?= __('Div1') ?></td>
            <td><?= h($customer->div1) ?></td>
        </tr>
        <tr>
            <td><?= __('Mail1') ?></td>
            <td><?= h($customer->mail1) ?></td>
        </tr>
        <tr>
            <td><?= __('Admin Name2') ?></td>
            <td><?= h($customer->admin_name2) ?></td>
        </tr>
        <tr>
            <td><?= __('Div2') ?></td>
            <td><?= h($customer->div2) ?></td>
        </tr>
        <tr>
            <td><?= __('Mail2') ?></td>
            <td><?= h($customer->mail2) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $customer->has('user') ? $this->Html->link($customer->user->name, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($customer->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Contracts') ?></h3>
    </div>
    <?php if (!empty($customer->contracts)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Contract Date') ?></th>
                <th><?= __('Contractname Id') ?></th>
                <th><?= __('File') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customer->contracts as $contracts): ?>
                <tr>
                    <td align="right"><?= h($contracts->id) ?></td>
                    <td><?= h($contracts->contract_date) ?></td>
                    <td><?= h($contracts->contractname->contract_name) ?></td>
                    <td><?= $this->Html->link($contracts->file, ['controller' => 'Contracts', 'action' => 'download', $contracts->id]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'view', $contracts->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'edit', $contracts->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <!-- <?= $this->Form->postLink('', ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Contracts</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Licenses') ?></h3>
    </div>
    <?php if (!empty($customer->licenses)): ?>
        <table class="table table-striped text-nowrap">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Issued') ?></th>
                <th><?= __('License No') ?></th>
                <th><?= __('Product Name') ?></th>
                <th><?= __('License Name') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Enddate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customer->licenses as $licenses): ?>
                <tr>
                    <td align="right"><?= h($licenses->id) ?></td>
                    <td><?= h($licenses->issued) ?></td>
                    <td><?= h($licenses->license_no) ?></td>
                    <td><?= h($licenses->product_name) ?></td>
                    <td><?= h($licenses->license_name) ?></td>
                    <td><?= h($licenses->startdate) ?></td>
                    <td><?= h($licenses->enddate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'view', $licenses->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'edit', $licenses->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil']) ?>
                        <!-- <?= $this->Form->postLink('', ['controller' => 'Licenses', 'action' => 'delete', $licenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licenses->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash']) ?> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Licenses</p>
    <?php endif; ?>
</div>
