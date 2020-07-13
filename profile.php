<?php
session_start();
include("logout.php");

if (!isset($_SESSION['userEmail'])) {
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GUEST BOOK | PROFILE</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- UPDATE MODAL & FORM -->
  <div id="updatemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title">Update Your Data</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="h1">&times;</span>
          </button>
        </div>
        <div class="update-message">

        </div>
        <div class="modal-body">
          <form id="form-update">
            <div class="form-group">
              <input type="text" name="update" class="form-control form-control-lg" id="update">
            </div>
            <div class="form-group">
              <input type="submit" value="Update" class="btn btn-lg btn-danger" name="update" id="update-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="profile-container">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand" href="#">GUESTBOOK</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link font-weight-bold" href="profile.php?logout=true" class="btn">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <section class="data container-fluid px-4 mt-5 bg-warning py-5">
      <table class='table table-striped table-inverse table-responsive text-center'>
        <thead class='thead-inverse'>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Purpose of Visit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("getData.php");
          ?>
        </tbody>
      </table>
    </section>
    <section class="info px-2 pt-5">
      <h5 class="d-flex align-items-center flex-row"><span class="text-danger h1 mr-1 my-0 pt-1">*</span> <strong>Click on your data to update your information.<strong></h5>
    </section>
    <section class="footer bg-dark text-light text-center mt-5 px-2">
      <small class="small text-muted">
        &copy; GUESTB<span class="text-warning">OO</span>K 2020
      </small>
    </section>
  </div>
  <script src="js/bootstrap/jquery.min.js"></script>
  <script src="js/bootstrap/popper.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/update.js"></script>
</body>

</html>