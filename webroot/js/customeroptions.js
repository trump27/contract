$(function () {
    function listChange() {
        var customerselected = $("#customer-id").val();
        $.ajax({
            url: "/customers/customeroptions/" + $("#client-id").val(),
        })
        .done(function (data) {
            $("#customer-id").html(data);
            $("#customer-id").val(customerselected);
            $("#customer-id").effect("highlight", "slow");
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    }
    $("#client-id").bind("change keyup", listChange);
    $("#client-id").trigger("change");  // 一度クリアする

});