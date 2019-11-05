<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>

      <?php require 'html/slide.php'; ?>

      <form action="login.php" method="post" id="login">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <button type="submit">Login</button>
        </div>
      </form>

    <script src="js/slide.js"></script>
    <script src="js/getDuration.js"></script>
  </body>
</html>