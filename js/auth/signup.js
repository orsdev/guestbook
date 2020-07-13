$(document).ready(function () {
  $('#formsignup').submit(function (e) {
    e.preventDefault();
    const formData = $(this).serializeArray();

    $.ajax({
      type: "POST",
      url: "auth/signup.php",
      data: formData,
      success: function (response) {
        if (response) {
          $('.signup-message').html(response);
        }
      }
    });

  })
})