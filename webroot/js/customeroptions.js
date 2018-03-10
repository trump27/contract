$(function () {
    function listChangecustomer() {
        var customerselected = $("#customer-id").val();
        $.ajax({
            url: "/customers/customeroptions/" + $("#client-id").val(),
        })
        .done(function (data) {
            $("#customer-id").html(data);
            $("#customer-id").val(customerselected);
            $("#customer-id").effect("highlight", "slow");
            $("#customer-id").trigger("change");    // fire
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    }
    $("#client-id").bind("change keyup", listChangecustomer);
    $("#client-id").trigger("change");  // 一度クリアする

});