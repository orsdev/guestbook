<?php

function usernameExist($db, $userName)
{
  $userName = mysqli_escape_string($db, $userName);

  $sql = "SELECT userName FROM users WHERE userName='$userName'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_num_rows($result);


  return $row == 1 ? 1 : 0;
};
