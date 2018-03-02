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
    <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>

<?=$this->Html->script('customeroptions',['block' => true]) ?>
<?=$this->Html->script('orderoptions',['block' => true]) ?>
<?=$this->Html->script('customerinfo', ['block' => true])?>

<h1 class="page-header"><?= __('Licenses') ?></h1>
<?= $this->Form->create($license, ['align' => [
    'type'=> 'file',
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
    <legend><?= __('Add {0}', ['License']) ?></legend>
    <?php
    echo $this->Form->control('client_id', ['options' => $clients]);
    echo $this->Form->control('customer_id', ['options' => $customers]);
    echo $this->Form->control('order_id', ['options' => $orders]);
    echo $this->Form->control('condition_id', ['options' => $conditions]);
    echo $this->Form->control('status_id', ['options' => $statuses]);
    echo $this->Form->control('issued', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('license_no');
    echo $this->Form->control('relate_no');
    echo $this->Form->control('product_name');
    echo $this->Form->control('license_name', ['value'=>'ユーザライセンス']);
    echo $this->Form->control('language_id', ['options' => $languages]);
    echo $this->Form->control('license_qty', ['type'=>'radio', 'options'=>$this->My->qty()]);
    echo $this->Form->control('startdate', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('enddate', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('license_key');
    echo $this->Form->control('notice');
    echo $this->Form->control('file', ['type'=>'file']);
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
