<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=__('Customer')?> 選択</h4>
      </div>
      <div class="modal-body">

      <div class="alert alert-info" role="alert">クライアント名で絞り込み、利用プロダクトを選択してください。</div>
<?php
echo $this->Form->create(null);
echo $this->Form->control('searchCustomer', ['label' => __('Clients') . '名']);
echo $this->Form->control('customer_id', ['options' => null, 'label' => false, 'size' => 7]);
echo $this->Form->end();
?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-select-customer" class="btn btn-primary" data-dismiss="modal">選択</button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    var t;
    $("#searchcustomer").on("keyup change paste", function () {
        clearTimeout(t);
        t = setTimeout(function () {
            $.ajax({
                url: "/guides/ajaxcustomers/" + $('#searchcustomer').val(),
            })
            .done(function (data) {
                $("#customer-id").html(data);
            })
            .fail(function () {
                console.log('cannot load options.');
            })
        }, 300);
    });
    $("#btn-select-customer").click(function (e) {
        if ($('#customer-id').val()===null) {
            alert("選択されていません。");
            e.preventDefault();
            e.stopImmediatePropagation();
            return
        }
        location.replace('<?= $replaceUrl ?>' + $('#customer-id').val());
//        location.replace('/clients');
    });
});
<?= $this->Html->scriptEnd() ?>
