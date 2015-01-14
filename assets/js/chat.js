$(".btn-send-comment").on("click", function () {
    var message = $("#chat_message").val();
    var url = $(this).data("url");
    $.ajax({
        url: url,
        type: "POST",
        data: {message: message},
        success: function (html) {
            $("#chat_message").val("");
            $("#chat-box").html(html);
        }
    });
});
