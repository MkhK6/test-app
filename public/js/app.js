$(".send-message").click(function(event){
    event.preventDefault();
    let message = $("input[name=message]").val();
    let author = $("input[name=author]").val();

    $.ajax({
      url: "/message",
      type:"POST",
      data:{
        message:message,
        author:author,
      },
      success:function(response){
        $('#ajaxform')[0].reset();
        console.log(response)
        $('.media-list').append("<li class=\"media  border-bottom\"><div class=\"media-body\"><h4 class=\"media-heading\">" + response.author + "</h4><p>" + response.message + "</p><div></li> ");
      },
     });
});

$(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

$(function () {
    x=3;
    $('#myList li').slice(0, 3).show();
    $('#loadMore').on('click', function (e) {
        e.preventDefault();
        x = x+3;
        $('#myList li').slice(0, x).slideDown();
        if(($('#myList li').slice(0, x).slideDown().length) == ($('#myList li').length)){
            $('#loadMore').hide();
        }
    });
});