<?php
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Slides</title>
    <link rel="shortcut icon" href="res/favicon.ico"/>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body class="black">
      <?php
       require 'html/slide.php'; 
        session_start();
        
        if(isset($_SESSION['user']) ){
          include 'html/uploadFile.php';

          include 'html/select.php';
          if ($_SESSION['isadmin'] == 1) {
            include 'html/delete.php';
          }
        }else{
          require 'html/loginPage.php';
        }
      ?>

    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/slide.js"></script>
    <script src="js/getDuration.js"></script>
    <script src="js/collapsible.js"></script>
  </body>
</html>