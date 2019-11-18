<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>

      <?php 
      
        require 'html/slide.php'; 

        if(isset($_SESSION['user']) ){
          include 'html/uploadFile.php';
        }else{
          require 'html/loginPage.php';
        }
      ?>

    <script src="js/slide.js"></script>
    <script src="js/getDuration.js"></script>
  </body>
</html>