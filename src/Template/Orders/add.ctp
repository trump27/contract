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
    <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Licensehistories'), ['controller' => 'Licensehistories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Licensehistory'), ['controller' => 'Licensehistories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Licensehistories'), ['controller' => 'Licensehistories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Licensehistory'), ['controller' => 'Licensehistories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
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
    <legend><?= __('Add {0}', ['Order']) ?></legend>
    <?php
    echo $this->Form->control('company_code');
    echo $this->Form->control('company_name1');
    echo $this->Form->control('company_name2');
    echo $this->Form->control('order_date');
    echo $this->Form->control('order_no');
    echo $this->Form->control('order_detail_no');
    echo $this->Form->control('purchase_no');
    echo $this->Form->control('delivery_date');
    echo $this->Form->control('sales_date');
    echo $this->Form->control('status_msg');
    echo $this->Form->control('product_category');
    echo $this->Form->control('product_code');
    echo $this->Form->control('product_name');
    echo $this->Form->control('quantity');
    echo $this->Form->control('price');
    echo $this->Form->control('sales_dept');
    echo $this->Form->control('sales_staff');
    echo $this->Form->control('file');
    echo $this->Form->control('dir');
    echo $this->Form->control('size');
    echo $this->Form->control('type');
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
