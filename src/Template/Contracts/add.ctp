<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Contractnames'), ['controller' => 'Contractnames', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Contractname'), ['controller' => 'Contractnames', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Contractnames'), ['controller' => 'Contractnames', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Contractname'), ['controller' => 'Contractnames', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>
<h1 class="page-header"><?= __('Contract') ?></h1>
<?= $this->Form->create($contract, [
    'type'=> 'file',
    'align' => [
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
    <legend><?= __('Add {0}', ['Contract']) ?></legend>
    <?php
    echo $this->Form->control('client_id', ['options' => $clients]);
    echo $this->Form->control('customer_id', ['options' => $customers]);
    echo $this->Form->control('contractname_id', ['options' => $contractnames]);
    echo $this->Form->control('contract_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('remarks');
    echo $this->Form->control('file', ['type'=>'file']);
    // echo $this->Form->control('dir');
    // echo $this->Form->control('size');
    // echo $this->Form->control('type');
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
