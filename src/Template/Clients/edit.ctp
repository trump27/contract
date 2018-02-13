<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $client->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licensehistories'), ['controller' => 'Licensehistories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Licensehistory'), ['controller' => 'Licensehistories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $client->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licensehistories'), ['controller' => 'Licensehistories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Licensehistory'), ['controller' => 'Licensehistories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Clients') ?></h1>
<?= $this->Form->create($client, ['align' => [
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
    <legend><?= __('Edit {0}', ['Client']) ?></legend>
    <?php
    echo $this->Form->control('client_name');
    echo $this->Form->control('company_code');
    echo $this->Form->control('identity1');
    echo $this->Form->control('partner_flag', ['type' => 'radio', 'options' => [
        0 => 'No', 1 => 'Yes',
    ]]);
    echo $this->Form->control('remarks');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
