$(function () {
    var t;
    $("#search").on("keyup change", function () {
        clearTimeout(t);
        t = setTimeout(function () {
            $.ajax({
                url: "/guides/search/" + $('#search').val(),
            })
                .done(function (data) {
                    $("#customer-id").html(data);
                })
                .fail(function () {
                    console.log('cannot load options.');
                })
        }, 300);
    });

});
