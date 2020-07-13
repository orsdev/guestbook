<?php
session_start();

include("../config/db.php");
include("../helper/emailExist.php");
include("../helper/getPassword.php");

$errorMessage = "";
$userEmail = "";
$userPassword = "";

// VALIDATE EMAIL ADDRESS
if (isset($_POST['login-email'])) {
  $userEmail = $_POST['login-email'];

  if (empty($userEmail)) {
    $errorMessage .= "<p class='h5 text-danger'> Enter your Email Address. </p>";
  } else {
    $userEmail = filter_var($userEmail, FILTER_SANITIZE_STRING);

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
      $errorMessage .= "<p class='h5 text-danger'> Enter a valid Email Address. </p>";
    } else {
      $userExist = emailExist($db, $userEmail);
      if ($userExist == 0) {
        $errorMessage .= "<p class='h5 text-danger'> Email not found in Database. </p>";
      }
    }
  }
};

// VALIDATE PASSWORD
if (isset($_POST['login-password'])) {
  $userPassword = $_POST['login-password'];

  if (empty($userPassword)) {
    $errorMessage .= "<p class='h5 text-danger'> Enter your Password. </p>";
  } else {
    $userPassword = filter_var($userPassword, FILTER_SANITIZE_STRING);

    $passwordChecker = getPassword($db, $userEmail);
    $hashed = hash('sha256', $userPassword);


    if ($hashed !== $passwordChecker) {
      $errorMessage .= "<p class='h5 text-danger'> Email or Password incorrect. </p>";
    }
  }
};

if ($errorMessage) {
  $message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h5'>&times;</span>
  </button>
  <strong>$errorMessage</strong> 
</div>";

  echo $message;
  exit;
};

$userEmail = mysqli_escape_string($db, $userEmail);
$userPassword = mysqli_escape_string($db, $userPassword);

$userPassword = hash('sha256', $userPassword);

$sql = "SELECT * FROM users WHERE userEmail='$userEmail' AND userPassword='$userPassword'";
$result = mysqli_query($db, $sql);

if ($result) {
  $_SESSION['userEmail'] = $userEmail;
  echo 'success';
} else {
  $message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h5'>&times;</span>
  </button>
  <strong  class='h5'>Unable to Login..Please try again later</strong> 
</div>";

  echo $message;
}

mysqli_close($db);
