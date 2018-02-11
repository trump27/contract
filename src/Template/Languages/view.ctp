<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?> </li>
<li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?> </li>
<li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Languages') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($language->language_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($language->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Language Name') ?></td>
            <td><?= h($language->language_name) ?></td>
        </tr>
    </table>
</div>
