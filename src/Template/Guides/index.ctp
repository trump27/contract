<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="jumbotron">
  <h1>契約登録</h1>
  <p>契約書PDFを登録する。</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    function getOptions() {
        $.ajax({
            url: "/guides/search/" + $('#search').val(),
        })
        .done(function (data) {
            $("#customer-id").html(data);
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    }
    var t;
    $("#search").bind("change keyup", getOptions);
/*      setTimeout(getOptions, 300)
      clearTimeout(t);
      t = setTimeout(function() {
        getOptions;
      }, 300);
); */
});
<?= $this->Html->scriptEnd() ?>

<?php
echo $this->Form->create(null);
echo $this->Form->control('search');
echo $this->Form->control('customer_id', ['options' => null, 'size'=>7]);

echo $this->Form->button(__("Save"), ['class'=>'btn-primary']);
echo $this->Form->end();
?>

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
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
        <input type="text" value="123" class="form-control" id="exampleInput1" placeholder="数値を入力してください">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-save" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function() {
  // ダイアログ表示前にJavaScriptで操作する
  $('#btn-save').click(function () {
    var recipient = $(exampleInput1).val();
    alert(recipient);
  });
});
<?= $this->Html->scriptEnd() ?>
