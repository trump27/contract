<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contract->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contract->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>
<?= $this->Html->script('customeroptions',['block' => true]) ?>
<?= $this->Html->script('orderoptions',['block' => true]) ?>
<h1 class="page-header"><?= __('Contract') ?></h1>
<?= $this->Form->create($contract, [
    'type'=> 'file',
    'align' => [
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
    <legend><?= __('Edit {0}', ['Contract']) ?></legend>
    <?php
    echo $this->Form->hidden('mode', ['value' => 'edit']);
    echo $this->Form->control('client_id', ['options' => $clients]);
    echo $this->Form->control('customer_id', ['options' => $customers]);
    echo $this->Form->control('order_id', ['options' => $orders]);
?>
<div class="form-group">
<div class=" col-sm-offset-3 col-md-offset-3">
<button type="button" class="btn btn-success"
    data-toggle="modal" data-target="#orderModal" style="margin-left:15px">
選択した受注を確認する
</button>
</div>
</div>
<?php
    echo $this->Form->control('contractname_id', ['options' => $contractnames]);
    echo $this->Form->control('contract_date', ['type' => 'text', 'class' => 'datepicker']);
    echo $this->Form->control('remarks');
    echo $this->Form->control('status_id');
    // echo $this->Form->control('status_id', ['options' => $statuses]);
    // echo $this->Form->control('file', ['disabled'=>'disabled', 'value'=>urldecode($contract->file)]);
    // echo $this->Form->control('file', ['type' => 'file', 'label'=>'新しいファイル']);
    echo $this->Form->control('file', ['type'=>'file', 'label' => '新しいファイル',
            'help' =>  "登録済みのファイル： ". $this->Html->link($contract->file, ['controller' => 'Contracts', 'action' => 'download', $contract->id])
        ]);

    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>

<?php
echo $this->element('vw_order_dialog');
?>
