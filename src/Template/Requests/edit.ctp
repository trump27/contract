<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $request->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Appforms'), ['controller' => 'Appforms', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $request->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('List Appforms'), ['controller' => 'Appforms', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
$this->element('datepicker');
?>
<?= $this->Html->script('customeroptions',['block' => true]) ?>
<h1 class="page-header"><?= __('Request') ?></h1>
<?= $this->Form->create($request, ['align' => [
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
    <legend><?= __('Edit {0}', ['Request']) ?></legend>
    <?php
    echo $this->Form->control('status_id', ['options' => $this->My->requestorder(), 'value' => 10, 'label' => '依頼']);
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
    echo $this->Form->control('appform_id', ['options' => $appforms]);
    echo $this->Form->control('product_name');
    echo $this->Form->control('license_name');
    echo $this->Form->control('language_id', ['options' => $languages]);
    echo $this->Form->control('license_qty', ['type'=>'radio', 'options'=>$this->My->qty()]);
    echo $this->Form->control('license_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('startsupp_date', ['type'=>'text', 'class'=>'datepicker']);
    echo $this->Form->control('notice');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>

<?php
echo $this->element('vw_license_dialog');
?>
