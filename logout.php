<?php
  if(isset($_SESSION['userEmail'])
  && isset($_GET['logout']) == 'true'){
   //session is destroyed
   session_destroy();
   $_SESSION = array();

   //take user back to index page
   header("Location: index.php");
  
  };
