<?php
$this->start('modalCustomer');

echo $this->Form->create(null);
echo $this->Form->control('searchCustomer', ['label'=>__('Customer').'名']);
echo $this->Form->control('customer_id', ['options' => null, 'label'=>false, 'size' => 7]);

// echo $this->Form->button(__("Save"), ['class' => 'btn-primary']);
echo $this->Form->end();

$this->end();
?>

<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=__('Customer')?> 選択</h4>
      </div>
      <div class="modal-body">
        <?= $this->fetch('modalCustomer') ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" id="btn-select" class="btn btn-primary">選択</button> -->
        <button type="button" id="btn-select" class="btn btn-primary" data-dismiss="modal">選択</button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    var t;
    $("#searchcustomer").on("keyup change", function () {
        clearTimeout(t);
        t = setTimeout(function () {
            $.ajax({
                url: "/guides/search/" + $('#searchcustomer').val(),
            })
            .done(function (data) {
                $("#customer-id").html(data);
            })
            .fail(function () {
                console.log('cannot load options.');
            })
        }, 300);
    });

    $("#btn-select").click(function () {
        if ($('#customer-id').val()===null) {
            alert("選択されていません。");
            return
        }
        ///alert($('#customer-id').val());
        //$('#customerModal').modal('toggle');
        location.replace('http://localhost:8765/clients');
    });
});

<?= $this->Html->scriptEnd() ?>