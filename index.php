<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body class="black">
      <?php 
      
       require 'html/slide.php'; 
        session_start();
        
        if(isset($_SESSION['user']) ){
          include 'html/uploadFile.php';

          include 'html/select.php';

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