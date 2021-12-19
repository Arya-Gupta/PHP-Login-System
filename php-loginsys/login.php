<?php
  $login=false;
  $showError=false;
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    include '_dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM users WHERE username='$username'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        if(password_verify($password, $row['password']))
        {
          $login=true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;
          header("location: welcome.php");
        }
        else
          $showError="Invalid Credentials";
      }
    }
    else
      $showError="Invalid Credentials";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
  </head>

  <body>
    <?php
      require 'partials.php';
      if($login)
      {
        echo 
        '<div class="alert alert-success" role="alert">
          You have successfully logged in!
        </div>';
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        //function to redirect to welcome.php
        header("location: welcome.php");
      }
      if($showError)
      {
        echo 
        '<div class="alert alert-danger" role="alert">
          Error! '.$showError.'
        </div>';
      }
    ?>

    <!----------Login form---------->
    <h1 class="mt-5" style="text-align: center;">Login</h1>
    <form class="mx-auto" id="register-form" action="/php-loginsys/login.php" method="post">
      <div class="mb-3 mt-5 mx-auto">
        <label for="username" class="form-label">Username </label>
        <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </body>
</html>