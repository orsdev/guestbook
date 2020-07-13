<?php

$user = "root";
$password = "";
$dbName = "guestbook";
$host = "localhost";

$db = mysqli_connect($host, $user, $password, $dbName);

if (mysqli_connect_errno()) {
  echo
    "<div class='alert alert-warning text-center alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true' class='h1'>&times;</span>
  </button>
  <strong> Cannot connect to Database...</strong> 
</div>";
};
