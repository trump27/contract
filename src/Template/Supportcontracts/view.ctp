<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Supportcontract'), ['action' => 'edit', $supportcontract->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Supportcontract'), ['action' => 'delete', $supportcontract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supportcontract->id)]) ?> </li>
<li><?= $this->Html->link(__('List Supportcontracts'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Supportcontract'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Supportcontract'), ['action' => 'edit', $supportcontract->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Supportcontract'), ['action' => 'delete', $supportcontract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supportcontract->id)]) ?> </li>
<li><?= $this->Html->link(__('List Supportcontracts'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Supportcontract'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Supportcontract') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($supportcontract->eu_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($supportcontract->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Company Code') ?></td>
            <td><?= h($supportcontract->company_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Contractor') ?></td>
            <td><?= h($supportcontract->contractor) ?></td>
        </tr>
        <tr>
            <td><?= __('Eu Company Code') ?></td>
            <td><?= h($supportcontract->eu_company_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Eu Name') ?></td>
            <td><?= $supportcontract->has('client') ? $this->Html->link($supportcontract->eu_name, ['controller' => 'Clients', 'action' => 'view', $supportcontract->client->id]) : '' ?></td>
            <!-- <td><?= h($supportcontract->eu_name) ?></td> -->
        </tr>
        <tr>
            <td><?= __('Contract No') ?></td>
            <td><?= h($supportcontract->contract_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Contract No2') ?></td>
            <td><?= h($supportcontract->contract_no2) ?></td>
        </tr>
        <tr>
            <td><?= __('Startdate') ?></td>
            <td><?= h($supportcontract->startdate) ?></td>
        </tr>
        <tr>
            <td><?= __('Enddate') ?></td>
            <td><?= h($supportcontract->enddate) ?></td>
        </tr>
        <tr>
            <td><?= __('Term') ?></td>
            <td><?= $this->Number->format($supportcontract->term) ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= h($supportcontract->category) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($supportcontract->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Dept') ?></td>
            <td><?= h($supportcontract->sales_dept) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Staff') ?></td>
            <td><?= h($supportcontract->sales_staff) ?></td>
        </tr>
        <tr>
            <td><?= __('Price') ?></td>
            <td><?= $this->Number->format($supportcontract->price) ?></td>
        </tr>
        <tr>
            <td><?= __('Contract Date') ?></td>
            <td><?= h($supportcontract->contract_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($supportcontract->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($supportcontract->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Remarks') ?></td>
            <td><?= $this->Text->autoParagraph(h($supportcontract->remarks)); ?></td>
        </tr>
    </table>
</div>

