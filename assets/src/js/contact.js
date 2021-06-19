const $ = require("jquery");
Window.prototype.$ = $;

$(document).ready(function ($) {
  $("#contact-form").validate();

  $("#contact-form").on("submit", function (e) {
    if (!e.isDefaultPrevented()) {
      var url = "wp-content/themes/Epignosi_v2/contact.php";

      $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(),
        success: function (data) {
          var messageAlert = "alert-" + data.type;
          var messageText = data.message;

          var alertBox =
            '<div class="alert ' +
            messageAlert +
            ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
            messageText +
            "</div>";

          if (messageAlert && messageText) {
            $("#contact-form").find(".messages").html(alertBox);
            $("#contact-form")[0].reset();
          }
        },
      });
      return false;
    }
  });
});
