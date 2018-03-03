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
    <li><?=$this->Html->link(__('List Licenses'), ['action' => 'index'])?></li>
    <li><?=$this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index'])?> </li>
    <li><?=$this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'])?> </li>
    <li><?=$this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'])?> </li>
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
    <li><?=$this->Html->link(__('List Licenses'), ['action' => 'index'])?></li>
    <li><?=$this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index'])?> </li>
    <li><?=$this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'])?> </li>
    <li><?=$this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'])?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>
<?=$this->Html->script('customeroptions', ['block' => true])?>
<?=$this->Html->script('orderoptions',['block' => true]) ?>
<h1 class="page-header"><?=__('Licenses')?></h1>
<?=$this->Form->create($license, ['align' => [
    'type' => 'file',
    'sm' => [
        'left' => 3,
        'middle' => 8,
        'right' => 1,
    ],
    'md' => [
        'left' => 3,
        'middle' => 6,
        'right' => 2,
    ],
]]);?>
<fieldset>
    <legend><?=__('Edit {0}', ['License'])?></legend>
    <?php
echo $this->Form->control('client_id', ['options' => $clients]);
echo $this->Form->control('customer_id', ['options' => $customers]);
echo $this->Form->control('order_id', ['options' => $orders]);
?>
<div class="form-group">
<div class=" col-sm-offset-3 col-md-offset-3">
<button type="button" class="btn btn-primary"
    data-toggle="modal" data-target="#licenseModal" style="margin-left:15px">
登録済みライセンスを確認する
</button>
</div>
</div>
<?php

echo $this->Form->control('relate_no');
echo $this->Form->control('condition_id', ['options' => $conditions,
    'help'=>Cake\Utility\Text::toList($conditions->toArray(), $and = 'と').'のいずれかの状態を選択'
    ]);
echo $this->Form->control('status_id', ['options' => $statuses]);
echo $this->Form->control('issued', ['type' => 'text', 'class' => 'datepicker']);
echo $this->Form->control('license_no');
echo $this->Form->control('product_name');
echo $this->Form->control('license_name');
echo $this->Form->control('language_id', ['options' => $languages]);
echo $this->Form->control('license_qty', ['type'=>'radio', 'options'=>$this->My->qty()]);
echo $this->Form->control('startdate', ['type' => 'text', 'class' => 'datepicker']);
echo $this->Form->control('enddate', ['type' => 'text', 'class' => 'datepicker']);
echo $this->Form->control('license_key');
echo $this->Form->control('notice');
echo $this->Form->control('file', ['disabled' => 'disabled', 'value' => urldecode($license->file)]);
echo $this->Form->control('file', ['type' => 'file', 'label' => '新しいファイル']);
?>
</fieldset>
<?=$this->Form->button(__("Save"), ['class' => 'btn-primary']);?>
<?=$this->Form->end()?>

<?php
echo $this->element('vw_license_dialog');
?>
