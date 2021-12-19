<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Signup</title>
  </head>

  <body>
    <?php
      require 'partials.php';
    ?>
    <style>
      #logout-link
      {
        color: blue;
      }  
    </style>
    <h1 class="display-1 mt-5" style="text-align: center;">
        Hello <?php echo $_SESSION['username']; ?>!<br>
        Welcome to PHP Login System. Click <a id="logout-link" href="/php-loginsys/logout.php">here</a> to logout.
    </h1>
  </body>
</html>