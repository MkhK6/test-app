var offset = 3;
$(".send-message").click(function(event) {
    event.preventDefault();
    let message = $("input[name=message]").val();
    let author = $("input[name=author]").val();

    $.ajax({
        url: "/message",
        type: "POST",
        data: {
            message: message,
            author: author,
        },
        success: function(response) {
            countData();
            $("#ajaxform")[0].reset();
            $("#myList").before(
                '<li class="media border-bottom" style="display: list-item;"><div class="media-body"><p style="color: #0d6efd; margin:0">Новый комментарий</p><h4 class="media-heading">' +
                response.author +
                "</h4><p>" +
                response.message +
                "</p><div></li> "
            );
        },
    });
});

$(document).ready(function() {
    countData();
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$("#loadMore").on("click", function(e) {
    e.preventDefault();
    getData(offset);
    offset += 3;
});

function getData(offset) {
    countData();
    $.ajax({
        url: "/message",
        type: "GET",
        data: {
            offset: offset,
        },
        success: function(response) {
            console.log(response)
            response['data'].forEach(function(item, i, arr) {
                $("#myList").append(
                    '<li class="media border-bottom" style="display: list-item;"><div class="media-body"><h4 class="media-heading">' +
                    item.author +
                    '</h4><p>' +
                    item.message +
                    '</p><div></li>'
                );
            });
        },
    });
}

function countData() {
    $.ajax({
        url: "/countMessages",
        type: "GET",
        data: {},
        success: function(response) {
            if (response <= offset) {
                $('#loadMore').hide();
            }
        },
    });
}