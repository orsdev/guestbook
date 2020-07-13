<?php
session_start();
include "config/db.php";

if (isset($_SESSION['userEmail'])) {
  $userEmail = mysqli_escape_string($db, $_SESSION['userEmail']);
  $data = $_POST['data'];
  $id = $_POST['id'];

  $sql = "UPDATE users SET $id='$data' WHERE userEmail='$userEmail'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_affected_rows($db);

  if ($row == 1) {

    if (preg_match('/@\w{2,6}\.\w{2,4}/', $data)) {
      $_SESSION['userEmail'] = $data;
    }

    echo "success";
  } else {
    echo
      "<div class='alert alert-warning text-center alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h1'>&times;</span>
  </button>
  <strong class='h5'>Unable to update data...</strong> 
</div>";
  }
}

mysqli_close($db);
