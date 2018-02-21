<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<?php $this->start('tb_actions');?>
    <li><a href="#number1">商品ＣＤ、取引情報参照</a></li>
<?php $this->end();?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>');?>

<div class="page-header">
  <h1><?= __('Guides')?></h1>
</div>

<div class="bs-callout bs-callout-primary">
  <h1>商品ＣＤ、取引情報参照</h1>
  <p>商品情報を確認する。</p>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#customerModal">
  契約を登録する
  </button>
</div>

<div class="bs-callout bs-callout-info">
  <h1>利用申込書作成依頼</h1>
  <p>ＸＸＸＸＸ</p>
</div>

<div class="bs-callout bs-callout-success">
  <h1>契約登録</h1>
  <p>契約書PDFを登録する。</p>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#customerModal">
  契約を登録する
</div>

<div class="bs-callout bs-callout-warning">
  <h1>ライセンス登録</h1>
  <p>受注データを選択し、ライセンスを登録する。</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>

<!-- <div class="jumbotron">
  <h1>利用申込書作成依頼</h1>
  <p>ＸＸＸＸＸ</p>
</div> -->

<!-- <div class="jumbotron">
  <h1>契約登録</h1>
  <p>契約書PDFを登録する。</p>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#customerModal">
  契約を登録する
  </button>
</div> -->




<div class="bs-callout bs-callout-default">
  <h4>Default Callout</h4>
  This is a default callout.
</div>

<div class="bs-callout bs-callout-primary">
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
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#customerModal">
  Launch demo modal
</button>

<?php 
echo $this->element('selectcustomer', [
  "replaceUrl" => '/clients'
]);


