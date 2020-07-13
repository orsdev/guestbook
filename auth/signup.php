<?php
include("../config/db.php");
include("../helper/emailExist.php");
include("../helper/usernameExist.php");

$errorMessage = "";
$firstName = "";
$lastName = "";
$userEmail = "";
$userPhone = "";
$userPassword = "";
$userGender = "";
$userPurpose = "";

// VALIDATE FIRSTNAME
if (isset($_POST['firstname'])) {
  $firstName = $_POST['firstname'];

  if (empty($firstName)) {
    $errorMessage .= "<p class='h5 '> Enter First Name. </p>";
  } else {
    $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
  }
};

// VALIDATE LASTNAME
if (isset($_POST['lastname'])) {
  $lastName = $_POST['lastname'];

  if (empty($lastName)) {
    $errorMessage .= "<p class='h5 '> Enter Last Name. </p>";
  } else {
    $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
  }
};

// VALIDATE EMAIL ADDRESS
if (isset($_POST['signup-email'])) {
  $userEmail = $_POST['signup-email'];

  if (empty($userEmail)) {
    $errorMessage .= "<p class='h5 '> Enter your Email Address. </p>";
  } else {
    $userEmail = filter_var($userEmail, FILTER_SANITIZE_STRING);

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
      $errorMessage .= "<p class='h5 '> Enter a valid Email Address. </p>";
    } else {
      $doesEmailExist = emailExist($db, $userEmail);
      if ($doesEmailExist == 1) {
        $errorMessage .= "<p class='h5 '> Email is already registered. </p>";
      }
    }
  }
};

// VALIDATE USER PURPOSE
if (isset($_POST['phone'])) {
  $userPhone = $_POST['phone'];

  if (empty($userPhone)) {
    $errorMessage .= "<p class='h5 '> Enter your Phone Number. </p>";
  } else {
    $userPhone  = filter_var($userPhone, FILTER_SANITIZE_STRING);
  }
};

// VALIDATE PASSWORD
if (isset($_POST['signup-password'])) {
  $userPassword = $_POST['signup-password'];

  if (empty($userPassword)) {
    $errorMessage .= "<p class='h5 '> Enter your Password. </p>";
  } else {
    $userPassword = filter_var($userPassword, FILTER_SANITIZE_STRING);
  }
};

// VALIDATE USER GENDER
if (isset($_POST['gender'])) {
  $userGender = $_POST['gender'];
  $userGender = filter_var($userGender, FILTER_SANITIZE_STRING);
};

// VALIDATE USER PURPOSE
if (isset($_POST['purpose'])) {
  $userPurpose = $_POST['purpose'];

  if (empty($userPurpose)) {
    $errorMessage .= "<p class='h5 '> Enter Purpose of Visit. </p>";
  } else {
    $userPurpose = filter_var($userPurpose, FILTER_SANITIZE_STRING);
  }
};


if ($errorMessage) {
  $message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h1'>&times;</span>
  </button>
  <strong>$errorMessage</strong> 
</div>";

  echo $message;
  exit;
}

// CONVERT FIRST LETTER TO UPPERCASE
$firstName = ucfirst($firstName);
$lastName = ucfirst($lastName);
$userPurpose = ucfirst($userPurpose);

$firstName = mysqli_escape_string($db, $firstName);
$lastName = mysqli_escape_string($db, $lastName);
$userEmail = mysqli_escape_string($db, $userEmail);
$userPassword = mysqli_escape_string($db, $userPassword);
$userGender = mysqli_escape_string($db, $userGender);
$userPurpose = mysqli_escape_string($db, $userPurpose);
$userPhone = mysqli_escape_string($db, $userPhone);

// HASH PASSWORD
$userPassword = hash('sha256', $userPassword);

$sql = "INSERT INTO users(firstName,LastName,userEmail, userPassword ,userGender,userPurpose, userPhone) VALUES('$firstName', '$lastName','$userEmail','$userPassword' , '$userGender','$userPurpose', '$userPhone')";
$result = mysqli_query($db, $sql);

if ($result) {
  $message = "<div class='alert alert-warning text-center alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h1'>&times;</span>
  </button>
  <strong class='h5'>Account created successfull. Login to manage your details.</strong> 
</div>";

  echo $message;
} else {
  $message = "<div class='alert alert-warning text-center alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h1'>&times;</span>
  </button>
  <strong  class='h5'>Unable to create account...Please try again later</strong> 
</div>";

  echo $message;
}

mysqli_close($db);
