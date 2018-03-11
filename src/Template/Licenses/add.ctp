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
    <li><?=$this->Html->link(__('List Licenses'), ['action' => 'index'])?></li>
    <li><?=$this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index'])?> </li>
    <li><?=$this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'])?> </li>
    <li><?=$this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'])?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
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
<?=$this->Html->script('orderoptions', ['block' => true])?>
<?=$this->Html->script('customerinfo', ['block' => true])?>

<h1 class="page-header"><?=__('Licenses')?></h1>
<?=$this->Form->create($license, [
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
]]);?>
<fieldset>
    <legend><?=__('Add {0}', ['License'])?></legend>
    <?php
echo $this->Form->hidden('mode', ['value'=>'add']);
echo $this->Form->control('status_id', ['value'=>20, 'label'=>'依頼先']);
echo "<h4>登録情報</h4>";
echo $this->Form->control('client_id', ['options' => $clients]);
echo $this->Form->control('customer_id', ['options' => $customers]);
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
echo $this->Form->control('condition_id', ['options' => $conditions,
    'help' => Cake\Utility\Text::toList($conditions->toArray(), $and = 'と') . 'のいずれかの状態を選択',
]);
// echo $this->Form->control('status_id', ['options' => $statuses]);
echo $this->Form->control('issued', ['type' => 'text', 'class' => 'datepicker']);
echo $this->Form->control('license_no');
echo $this->Form->control('relate_no');
echo $this->Form->control('product_name');
echo $this->Form->control('license_name', ['value' => 'ユーザライセンス']);
echo $this->Form->control('language_id', ['options' => $languages]);
echo $this->Form->control('license_qty', ['type' => 'radio', 'options' => $this->My->qty()]);
echo $this->Form->control('startdate', ['type' => 'text', 'class' => 'datepicker']);
echo $this->Form->control('enddate', ['type' => 'text', 'class' => 'datepicker']);
echo $this->Form->control('license_key');
echo $this->Form->control('notice');
echo $this->Form->control('file', ['type' => 'file']);
?>
</fieldset>
<?=$this->Form->button(__("Add"), ['class' => 'btn-primary']);?>
<?=$this->Form->end()?>

<?php
echo $this->element('vw_license_dialog');
echo $this->element('vw_order_dialog');
?>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    function formatDate (date, format) {
        format = format.replace(/yyyy/g, date.getFullYear());
        format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
        format = format.replace(/dd/g, ('0' + date.getDate()).slice(-2));
        format = format.replace(/HH/g, ('0' + date.getHours()).slice(-2));
        format = format.replace(/mm/g, ('0' + date.getMinutes()).slice(-2));
        format = format.replace(/ss/g, ('0' + date.getSeconds()).slice(-2));
        format = format.replace(/SSS/g, ('00' + date.getMilliseconds()).slice(-3));
        return format;
    };
    $("#startdate").on("keyup change paste", function () {
        if (!$("#enddate").val()) {
            var arr = $("#startdate").val().split('/');
            var start = new Date(arr[0], arr[1] - 1, arr[2]);
            console.log(start);
            start.setDate(start.getDate() - 1);
            start.setYear(start.getFullYear() + 1);
            $("#enddate").val(formatDate(start, 'yyyy/MM/dd'));
        }
    });
});
<?= $this->Html->scriptEnd() ?>
