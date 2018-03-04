<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=$this->Html->link('未処理タスク', ['controller' => 'Clients', 'action' => 'state', 'state']);?></li>
    <li><?=$this->Html->link('最近更新されたデータ', ['controller' => 'Clients', 'action' => 'state', 'recent']);?></li>
    <li><?=$this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']);?></li>
    <li><?=$this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']);?></li>
    <li><?=$this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']);?></li>
    <li><?=$this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']);?></li>
<?php $this->end();?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>');?>

<?php if ($mode=='state') { ?>
<div class="jumbotron">
  <h1>未処理タスク</h1>
  <p>処理が完了していないデータの一覧</p>
</div>
<?php } else { ?>
<div class="jumbotron">
  <h1>Recent 20 records</h1>
  <p>最近更新されたデータ</p>
</div>
<?php } ?>

<h2 class="page-header"><?=__('Orders')?></h2>
<table class="table table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?=__('Actions');?></th>
            <th><?=__('Company Name1');?></th>
            <th><?=__('Status Msg');?></th>
            <th><?=__('Status Id');?></th>
            <th><?=__('Order Date');?></th>
            <th><?=__('Delivery Date');?></th>
            <th><?=__('Sales Date');?></th>
            <th><?=__('Product Name');?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr class="<?=$order->client->partner_id?'active':''?>">

            <td class="actions">
                <?=$this->Html->link('', ['controller' => 'Orders', 'action' => 'view', $order->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info'])?>
            </td>
            <td><?=$order->has('client') ? $this->Html->link($this->my->trunc($order->company_name1), ['controller' => 'Clients', 'action' => 'view', $order->client->id]) : $order->company_name1; ?></td>
            <td><?=h($order->status_msg)?></td>
            <!-- <td><?= $order->has('status') ? $order->status->name : '未処理' ?></td> -->
            <td><?= $this->My->todo($order->status_id) ?></td>

            <td><?=h($order->order_date)?></td>
            <td><?=h($order->delivery_date)?></td>
            <td><?=h($order->sales_date)?></td>
            <td><?=$this->my->trunc($order->product_name,20)?></td>

        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<!-- Contract -->
<h2 class="page-header"><?= __('Contract') ?></h2>
<table class="table table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= __('Id'); ?></th>
            <th><?= __('Client'); ?></th>
            <th><?= __('Contract Date'); ?></th>
            <!-- <th><?= __('customer_id'); ?></th> -->
            <th><?= __('Contractname'); ?></th>
            <th><?= __('Status Id'); ?></th>
            <th><?= __('File'); ?></th>
            <th><?= __('Modified'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contracts as $contract): ?>
        <tr class="<?=$contract->client->partner_id?'active':''?>">

            <td class="actions">
                <?= $this->Html->link('', ['controller' => 'Contracts', 'action' => 'view', $contract->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <!-- <?= $this->Html->link('', ['action' => 'edit', $contract->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?> -->
                <!-- <?= $this->Form->postLink('', ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?> -->
            </td>
            <td align="right"><?= $this->Number->format($contract->id) ?></td>
            <td>
                <?= $contract->has('client') ? $this->Html->link($this->my->trunc($contract->client->client_name), ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?>
            </td>
            <td><?= $contract->contract_date ?></td>
            <td>
                <?= $contract->has('contractname') ? $this->Html->link($this->my->trunc($contract->contractname->contract_name), ['controller' => 'Contractnames', 'action' => 'view', $contract->contractname->id]) : '' ?>
            </td>
            <td><?= $this->My->todo($contract->status_id) ?></td>
            <td><?= $this->My->downloadlink($contract) ?></td>
            <td><?= h($contract->modified) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Licenses -->
<h2 class="page-header"><?= __('Licenses') ?></h2>
<table class="table table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= __('Id'); ?></th>
            <th><?= __('Client'); ?></th>
            <th><?= __('Customer'); ?></th>
            <th><?= __('Status'); ?></th>
            <th><?= __('Issued'); ?></th>
            <th><?= __('License No'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($licenses as $license): ?>
        <tr class="<?=$license->client->partner_id?'active':''?>">

            <td class="actions">
                <?= $this->Html->link('', ['controller' => 'Licenses', 'action' => 'view', $license->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
            </td>
            <td align="right"><?= $this->Number->format($license->id) ?></td>
            <td>
                <?= $license->has('client') ? $this->Html->link($this->my->trunc($license->client->client_name), ['controller' => 'Clients', 'action' => 'view', $license->client->id]) : '' ?>
            </td>
            <td>
                <?= $license->has('customer') ? $this->Html->link($this->my->trunc($license->customer->customer_name), ['controller' => 'Customers', 'action' => 'view', $license->customer->id]) : '' ?>
            </td>
            <td>
                <?= $this->My->todo($license->status_id) ?>
            </td>
            <td><?= h($license->issued) ?></td>
            <td><?= h($license->license_no) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
