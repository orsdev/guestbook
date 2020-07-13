$(document).ready(function () {
  $('#formlogin').submit(function (e) {
    e.preventDefault();
    const formData = $(this).serializeArray();

    $.ajax({
      type: "POST",
      url: "auth/login.php",
      data: formData,
      success: function (response) {
        if (response !== 'success') {
          $('.login-message').html(response);
        } else {
          window.location = 'profile.php';
        }
      }
    });

  })
})