$(document).ready(function () {
  $('tr').on('click', 'a', function (e) {

    const data = e.target.id;
    const id = $(this).parent().attr('id');


    if (data) {

      if (id == 'userEmail') {
        $('#update').attr('type', 'email');
      } else if (id == 'userPhone') {
        $('#update').attr('type', 'number');
      } else {
        $('#update').attr('type', 'text');
      }

      $('#update').val(data);

      $('#form-update').submit(function (e) {
        e.preventDefault();

        const formData = {
          id: id,
          data: $('#update').val()
        };

        $.ajax({
          type: "POST",
          url: "update.php",
          data: formData,
          success: function (response) {
            if (response == 'success') {
              window.location.reload();
            } else {
              $('.update-message').html(response);
            }
          }
        });
      })
    }

  })
})