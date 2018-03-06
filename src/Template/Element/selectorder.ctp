<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel"><?=__('Order')?> 選択</h4>
      </div>
      <div class="modal-body">

      <div class="alert alert-info" role="alert">クライアント名で絞り込み、受注データを選択してください。</div>
<?php
echo $this->Form->create(null);
echo $this->Form->control('searchclient', ['label' => __('Clients') . '名']);
// echo '<div id="client-list"></div>';
// echo '<div id="order-list"></div>';
echo $this->Form->end();
?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-select-order" class="btn btn-primary" data-dismiss="modal">選択</button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    var url = '';
    $('#orderModal').on('shown.bs.modal', function (e) {
        $('#searchclient').focus();
        var button = $(e.relatedTarget);
        url = button.data('url');
    })
    var t;
//    $("#searchclient").on("keyup change paste", function () {
    $("#searchclient").on("keyup paste", function () {
        clearTimeout(t);
        t = setTimeout(function () {
            $.ajax({
                url: "/guides/ajaxorders/" + $('#searchclient').val(),
            })
            .done(function (data) {
                $("#order-list").html(data);
            })
            .fail(function () {
                console.log('cannot load options.');
            })
        }, 300);
    });
    $("#btn-select-order").click(function (e) {
//        alert( $('input[name=select]:checked').val() );
        if (!$('input[name=select]:seleted').val()) {
            alert('未選択・・・');
        }
        if ($('#order-id').val()===null) {
            alert("対象を選択してください。");
            e.preventDefault();
            e.stopImmediatePropagation();
            return
        }
        location.replace(url + $('#order-id').val());
    });
});
<?= $this->Html->scriptEnd() ?>
