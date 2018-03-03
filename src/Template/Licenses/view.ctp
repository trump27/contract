<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit License'), ['action' => 'edit', $vw_license->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete License'), ['action' => 'delete', $vw_license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vw_license->id)]) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit License'), ['action' => 'edit', $vw_license->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete License'), ['action' => 'delete', $vw_license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vw_license->id)]) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New License'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Licenses') ?></h1>

<div class="bs-callout bs-callout-primary">
  <?= $this->Html->link('証書をWordで出力', ['action' => 'doc', $vw_license->id],
      ['class' => 'btn btn-lg btn-primary', 'role' => 'button']); ?>
</div>

<?php
echo $this->element('vw_license');
?>

