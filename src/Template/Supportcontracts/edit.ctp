<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supportcontract $supportcontract
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $supportcontract->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $supportcontract->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Supportcontracts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $supportcontract->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $supportcontract->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Supportcontracts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>
<h1 class="page-header"><?= __('Supportcontract') ?></h1>
<?= $this->Form->create($supportcontract, ['align' => [
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
    <legend><?= __('Edit {0}', ['Supportcontract']) ?></legend>
    <?php
    echo $this->Form->control('company_code');
    echo $this->Form->control('contractor');
    echo $this->Form->control('eu_company_code');
    echo $this->Form->control('eu_name');
    echo $this->Form->control('category');
    echo $this->Form->control('contract_no');
    echo $this->Form->control('contract_no2');
    echo $this->Form->control('product_name');
    echo $this->Form->control('contract_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('startdate', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('enddate', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('term');
    echo $this->Form->control('price');
    echo $this->Form->control('sales_dept');
    echo $this->Form->control('sales_staff');
    echo $this->Form->control('remarks');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
