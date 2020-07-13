<?php

function emailExist($db, $userEmail)
{
  $userEmail = mysqli_escape_string($db, $userEmail);

  $sql = "SELECT userEmail FROM users WHERE userEmail='$userEmail'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_num_rows($result);


  return $row == 1 ? 1 : 0;
};
