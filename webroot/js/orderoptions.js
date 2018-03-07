$(function () {
    function listChangeorder() {
        var orderselected = $("#order-id").val();
        console.log('test before:', orderselected);
        // return;
        if (!$("#client-id").val() ) {
            $("#order-id").html("");
            $("#order-id").effect("highlight", "slow");
            return;
        }
        $.ajax({
            url: "/orders/orderoptions/" + $("#client-id").val() + '/' +
                $('input:hidden[name="mode"]').val()
        })
            .done(function (data) {
                console.log('test after:', orderselected);
                $("#order-id").html(data);
                if ($('input:hidden[name="mode"]').val() !== 'add') {
                    $("#order-id").val(orderselected);
                }
                $("#order-id").effect("highlight", "slow");
            })
            .fail(function () {
                console.log('cannot load options.');
            })
    }
    $("#client-id").bind("change keyup", listChangeorder);
    $("#client-id").trigger("change");  // 一度クリアする

});