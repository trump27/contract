$(function () {
    var selected = $("#customer-id").val();
    function listChange() {
        $.ajax({
            url: "/customers/customeroptions/" + $("#client-id").val(),
        })
        .done(function (data) {
            $("#customer-id").html(data);
            $("#customer-id").val(selected);
            $("#customer-id").effect("highlight", "slow");
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    }
    $("#client-id").bind("change keyup", listChange);
    $("#client-id").trigger("change");  // 一度クリアする
    
});