$(function () {
    // for adding license
    function getCustomerInfo() {
        $.ajax({
            url: "/customers/customerinfo/" + $("#customer-id").val(),
        })
        .done(function (data) {
            $("#product-name").val(data.info.customer_name);
            $("#product-name").effect("highlight", "slow");
            $("#license-no").val(
                (data.info.customer_name.toLowerCase().indexOf('performer') > 0 ? 'WP-' : 'WPL-') +
                data.info.client.identity1 + '-' + data.info.identity2 + '-Lxx');
            $("#license-no").effect("highlight", "slow");
        })
        .fail(function () {
            console.log('cannot load options.');
        })
    }
    $("#customer-id").bind("change keyup", getCustomerInfo);
    // $("#customer-id").trigger("change");

});