<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="jumbotron">
  <h1>契約登録</h1>
  <p>契約書PDFを登録する。</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>




<div class="jumbotron">
  <h1>ライセンス登録</h1>
  <p>受注データを選択し、ライセンスを登録する。</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>

<div class="bs-callout bs-callout-success">
  <h4>ライセンス登録</h4>
  <p>受注データを選択し、ライセンスを登録する。</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>

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
$cell = $this->cell('Customer'); 
// echo $this->cell('Customer')->render();
$cell->viewBuilder()->setTemplate('');
echo $cell->render('display');
// echo $cell->render('display', '');
// echo $cell;

