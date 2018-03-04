<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $order->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $order->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>
<h1 class="page-header"><?= __('Orders') ?></h1>
<?= $this->Form->create($order, ['align' => [
    'sm' => [
        'left' => 3,
        'middle' => 8,
        'right' => 1
    ],
    'md' => [
        'left' => 3,
        'middle' => 6,
        'right' => 2
    ]
]]); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Order']) ?></legend>
    <?php
    echo $this->Form->control('company_code', ['options' => $clients]);
    echo $this->Form->control('company_name1');
    echo $this->Form->control('company_name2');
    echo $this->Form->control('order_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('orderym');
    echo $this->Form->control('order_no');
    echo $this->Form->control('order_detail_no');
    echo $this->Form->control('purchase_no');
    echo $this->Form->control('delivery_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('sales_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('status_msg');
    echo $this->Form->control('product_category');
    echo $this->Form->control('product_code');
    echo $this->Form->control('product_name');
    echo $this->Form->control('quantity');
    echo $this->Form->control('price');
    echo $this->Form->control('sales_dept');
    echo $this->Form->control('sales_staff');
    echo $this->Form->control('product_detail');
    echo $this->Form->control('status_id', ['options' => $statuses]);
    // echo $this->Form->control('file');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
