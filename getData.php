<?php
include 'config/db.php';

if (isset($_SESSION['userEmail'])) {
  $email = mysqli_escape_string($db, $_SESSION['userEmail']);

  $sql = "SELECT * FROM users";
  $result = mysqli_query($db, $sql);
  $row = mysqli_num_rows($result);

  if ($row > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
      $firstName = $rows['firstName'];
      $lastName = $rows['lastName'];
      $userEmail = $rows['userEmail'];
      $userGender = $rows['userGender'];
      $userPurpose = $rows['userPurpose'];
      $userPhone = $rows['userPhone'];

      $href;
      $dataTarget;
      $dataToggle;

      if ($userEmail == $_SESSION['userEmail']) {
        $href = "#updatemodal";
        $dataTarget = "#updatemodal";
        $dataToggle = "modal";
      } else {
        $href = "#";
        $dataTarget = "";
        $dataToggle = "";
      }



      echo   "
        <tr>
          <td id='firstName'>
            <a href='$href' id='$firstName' data-target='$dataTarget' data-toggle='$dataToggle'>
              $firstName
            </a>
          </td>
          <td id='lastName'>
             <a href='$href' id='$lastName' data-target='$dataTarget' data-toggle='$dataToggle'>
              $lastName
            </a>
          </td>
          <td id='userEmail'>
             <a href='$href' id='$userEmail' data-target='$dataTarget' data-toggle='$dataToggle'>
              $userEmail
            </a>
          </td>
          <td id='userPhone'>
             <a href='$href' id='$userPhone' data-target='$dataTarget' data-toggle='$dataToggle'>
              $userPhone
            </a>
          </td>
          <td id='userGender'>
           <a href='$href' id='$userGender' data-target='$dataTarget' data-toggle='$dataToggle'>     
           $userGender
            </a>
            </td>
          <td id='userPurpose'>
            <a href='$href' id='$userPurpose' data-target='$dataTarget' data-toggle='$dataToggle'>     
           $userPurpose
            </a>
          </td>
        </tr>";
    }
  }
}

mysqli_close($db);
