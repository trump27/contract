<?php
$this->start('sbar');

echo $this->Form->create(null);
echo $this->Form->control('search');
echo $this->Form->control('customer_id', ['options' => null, 'size' => 7]);

echo $this->Form->button(__("Save"), ['class' => 'btn-primary']);
echo $this->Form->end();

$this->end();
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <?= $this->fetch('sbar') ?>
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

<?= $this->Html->scriptEnd() ?>