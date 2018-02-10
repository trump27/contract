<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\License $license
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $license->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $license->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $license->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $license->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($license, ['align' => [
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
    <legend><?= __('Edit {0}', ['License']) ?></legend>
    <?php
    echo $this->Form->control('client_id', ['options' => $clients]);
    echo $this->Form->control('customer_id', ['options' => $customers]);
    echo $this->Form->control('order_id', ['options' => $orders]);
    echo $this->Form->control('status_id', ['options' => $statuses]);
    echo $this->Form->control('issued');
    echo $this->Form->control('license_no');
    echo $this->Form->control('relate_no');
    echo $this->Form->control('product_name');
    echo $this->Form->control('license_name');
    echo $this->Form->control('language');
    echo $this->Form->control('license_qty');
    echo $this->Form->control('startdate');
    echo $this->Form->control('enddate');
    echo $this->Form->control('license_key');
    echo $this->Form->control('notice');
    echo $this->Form->control('file');
    echo $this->Form->control('dir');
    echo $this->Form->control('size');
    echo $this->Form->control('type');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
