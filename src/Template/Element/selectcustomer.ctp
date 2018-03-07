<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel"><?=__('Customer')?> 選択</h4>
      </div>
      <div class="modal-body">

      <div class="alert alert-info" role="alert"><?=__('Client Name')?>で絞り込み、<?=__('Customer')?>を選択してください。</div>
<?php
echo $this->Form->create(null);
echo $this->Form->control('searchCustomer', ['label' => __('Clients') . '名']);
echo $this->Form->control('customer_id', ['options' => null, 'label' => false, 'size' => 5]);
echo $this->Form->end();
?>
<h4>(参考)未処理の <?=__('Orders')?></h4>
<div id="order-list" style="height:250px; overflow:auto;"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
        <!-- <button type="button" id="btn-select-customer" class="btn btn-primary" data-dismiss="modal">選択</button> -->

        <button type="button" id="btn-select-contract" class="btn btn-info btn-lg">
        契約を登録する
        </button>
        <button type="button" id="btn-select-license" class="btn btn-warning btn-lg">
        ライセンスを登録する
        </button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
//    var url = '';
    $('#customerModal').on('shown.bs.modal', function (e) {
        $('#searchcustomer').focus();
        var button = $(e.relatedTarget);
//        url = button.data('url');
    })
    var t;
//    $("#searchcustomer").on("keyup change paste", function () {
    $("#searchcustomer").on("keyup paste", function () {
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
            });
            // order list
            $.ajax({
                url: "/guides/ajaxorders/" + $('#searchcustomer').val(),
            })
            .done(function (data) {
                $("#order-list").html(data);
            })
            .fail(function () {
                console.log('cannot load order lists.');
            });
        }, 300);
    });
    $("#btn-select-contract").click(function (e) {
        if ($('#customer-id').val()===null) {
            alert("対象を選択してください。");
            e.preventDefault();
            e.stopImmediatePropagation();
            return
        }
        location.replace('/contracts/add/' + $('#customer-id').val());
    });
    $("#btn-select-license").click(function (e) {
        if ($('#customer-id').val()===null) {
            alert("対象を選択してください。");
            e.preventDefault();
            e.stopImmediatePropagation();
            return
        }
        location.replace('/licenses/add/' + $('#customer-id').val());
    });
});
<?= $this->Html->scriptEnd() ?>
