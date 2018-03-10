<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<?php $this->start('tb_actions');?>
    <li><?=$this->Html->link('未処理タスク', ['controller' => 'Clients', 'action' => 'state', 'state']);?></li>
    <li><?=$this->Html->link('最近更新されたデータ', ['controller' => 'Clients', 'action' => 'state', 'recent']);?></li>
    <hr>
    <li><a href="#number1">情報参照</a></li>
    <li><a href="#number2">契約書登録</a></li>
    <li><a href="#number3">ライセンス登録</a></li>
    <li><a href="#number4"><?=__('Request')?></a></li>
<?php $this->end();?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>');?>

<div class="jumbotron">
  <h1><?= __('Guides')?></h1>
  <p>各種登録処理のガイド</p>
</div>

<?php
echo $this->Html->link('hello', ['controller'=>'Requests', 'action'=>'add', 'client_id'=>9]);
?>

<div id="number1" />
<div class="bs-callout bs-callout-success">
  <h1>参考情報</h1>
  <p>基幹の情報を参照する。</p>

  <?= $this->Html->link('CANVASを確認する', ['controller'=>'Supportcontracts', 'action' => 'index'],
       ['class' => 'btn btn-lg btn-success', 'role' => 'button']); ?>
  <?= $this->Html->link('品目を確認する', ['controller'=>'Productinfos', 'action' => 'index'],
      ['class' => 'btn btn-lg btn-success', 'role' => 'button']); ?>
  <?= $this->Html->link('受注を確認する', ['controller'=>'Orders', 'action' => 'index'],
      ['class' => 'btn btn-lg btn-success', 'role' => 'button']); ?>
</div>

<div id="number2" />
<div class="bs-callout bs-callout-primary">
  <h1>契約登録</h1>
  <p>注文・取引における手続き、契約書（PDF）などを登録する。</p>
  <button type="button" data-url="/contracts/add/" class="btn btn-info btn-lg" data-toggle="modal" data-target="#customerModal">
  契約を登録する
  </button>
</div>

<div id="number3" />
<div class="bs-callout bs-callout-warning">
  <h1>ライセンス登録</h1>
  <p>ライセンスを登録・発行依頼する。</p>
  <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#customerModal">
  ライセンスを登録する
  </button>
</div>

<div id="number4" />
<div class="bs-callout bs-callout-info">
  <h1><?=__('Request')?></h1>
  <p>既存顧客のライセンス変更の利用申込書を登録、出力する。</p>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#customerModal">
  申込書を登録する
  </button>
</div>

<!-- <button type="button" data-url="/contracts/add/" class="btn btn-info btn-lg"
    data-toggle="modal" data-target="#orderModal">
受注
</button> -->


<!-- <div class="bs-callout bs-callout-default">
  <h4>Default Callout</h4>
  This is a default callout.
</div> -->

<!-- <div class="bs-callout bs-callout-primary">
  <h4>Primary Callout</h4>
  This is a primary callout.
</div>

<div class="bs-callout bs-callout-success">
  <h4>Success Callout</h4>
  This is a success callout.
</div>

<div class="bs-callout bs-callout-info">
  <h4>Info Callout</h4>
  This is an info callout.
</div>

<div class="bs-callout bs-callout-warning">
  <h4>Warning Callout</h4>
  This is a warning callout.
</div>

<div class="bs-callout bs-callout-danger">
  <h4>Danger Callout</h4>
  This is a danger callout.
</div> -->



<?php
echo $this->element('selectcustomer');
echo $this->element('selectorder');


