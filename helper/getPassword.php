<?php

function getPassword($db, $userEmail)
{
  $userEmail = mysqli_escape_string($db, $userEmail);

  $sql = "SELECT userPassword FROM users WHERE userEmail='$userEmail'";
  $result = mysqli_query($db, $sql);
  $rows = mysqli_fetch_assoc($result);

  return $rows['userPassword'];
};
