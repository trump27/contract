<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $vw_order->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $vw_order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vw_order->id)]) ?> </li>
<li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>

<?= $this->element('vw_order') ?>

