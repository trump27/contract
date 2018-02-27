$(function () {
    var selected = $("#order-id").val();
    function listChange() {
        $.ajax({
            url: "/orders/orderoptions/" + $("#client-id").val(),
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