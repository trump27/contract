<!-- Modal -->
<div class="modal fade" id="licenseModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel"><?=__('Licenses')?></h4>
      </div>
      <div class="modal-body">

      <div class="alert alert-info" role="alert">表示する<?=__('Licenses')?>を選択してください。</div>
<?php
echo $this->Form->create(null);
echo $this->Form->control('select_license', ['type'=>'select', 'label'=>false, 'empty'=>'---']);
echo $this->Form->end();

?>
<div id="infoview" style="overflow:auto;"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function () {
    $('#licenseModal').on('hide.bs.modal', function (e) {
        $("#select-license").html("");
        $("#infoview").hide();
    })
    $('#licenseModal').on('shown.bs.modal', function (e) {
        if (!$('#customer-id').val()) alert('案件が選択させていません');
        $("#select-license").html("");
        $("#infoview").html("");
        $.ajax({
            url: "/licenses/getrelative/" + $('#customer-id').val(),
        })
        .done(function (data) {
            $("#select-license").html(data).effect("highlight", "slow");
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    })
    var t;
    $("#select-license").on("change keyup paste", function () {
        clearTimeout(t);
        t = setTimeout(function () {
            $("#infoview").hide();
            $.ajax({
                url: "/licenses/getinfoview/" + $('#select-license').val(),
            })
            .done(function (data) {
                $("#infoview").html(data).fadeIn(1000);
//                $("#select-license").effect("highlight", "slow");
            })
            .fail(function () {
                console.log('cannot load getinfoview.');
            })
        }, 300);
    });
//    $("#customer-id").trigger("change");
});
<?= $this->Html->scriptEnd() ?>
