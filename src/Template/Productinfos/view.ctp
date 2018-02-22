<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Productinfo'), ['action' => 'edit', $productinfo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Productinfo'), ['action' => 'delete', $productinfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productinfo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Productinfos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Productinfo'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Productinfo'), ['action' => 'edit', $productinfo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Productinfo'), ['action' => 'delete', $productinfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productinfo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Productinfos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Productinfo'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Productinfo') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($productinfo->product_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= h($productinfo->category) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Code') ?></td>
            <td><?= h($productinfo->product_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($productinfo->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Segment') ?></td>
            <td><?= h($productinfo->segment) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($productinfo->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Use Support') ?></td>
            <td><?= $this->Number->format($productinfo->use_support) ?></td>
        </tr>
        <tr>
            <td><?= __('Price') ?></td>
            <td><?= $this->Number->format($productinfo->price) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($productinfo->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($productinfo->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Remarks') ?></td>
            <td><?= $this->Text->autoParagraph(h($productinfo->remarks)); ?></td>
        </tr>
    </table>
</div>

