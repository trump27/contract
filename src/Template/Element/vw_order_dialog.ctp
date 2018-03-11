<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel"><?=__('Orders')?></h4>
      </div>
      <div class="modal-body">

      <div class="alert alert-danger" id= "msg" display="none" role="alert">表示する<?=__('Orders')?>を選択してください。</div>

      <div id="orderinfo" style="overflow:auto;"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    $('#orderModal').on('shown.bs.modal', function (e) {
        $("#orderinfo").html("");
        if ($('#order-id').val()) {
            $('#msg').hide();
        } else {
            $('#msg').show();
            return;
        }
        $.ajax({
            url: "/orders/getinfoview/" + $('#order-id').val(),
        })
        .done(function (data) {
            $("#orderinfo").html(data);
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    })
});
<?= $this->Html->scriptEnd() ?>
