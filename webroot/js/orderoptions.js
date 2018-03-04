$(function () {
    var selected = $("#order-id").val();
    function listChange() {
        if (!$("#client-id").val() ) {
            $("#order-id").html("");
            $("#order-id").effect("highlight", "slow");
            return
        }
        $.ajax({
            url: "/orders/orderoptions/" + $("#client-id").val() + '/' +
                $('input:hidden[name="mode"]').val()
        })
            .done(function (data) {
                $("#order-id").html(data);
                $("#order-id").val(selected);
                $("#order-id").effect("highlight", "slow");
            })
            .fail(function () {
                console.log('cannot load options.');
            })
    }
    $("#client-id").bind("change keyup", listChange);
    $("#client-id").trigger("change");  // 一度クリアする

});