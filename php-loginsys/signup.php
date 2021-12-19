<?php
  $showAlert=false;
  $showError=false;
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    include '_dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $existSql="SELECT * FROM `users` WHERE username='$username'"; //check whether username exists
    $result=mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0)
    {
      $showError="Username already exists";
    }
    else
    {
      if(($password==$cpassword))
      {
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
          $showAlert=true;
        }
      }
      else
      {
        $showError="Passwords do not match";
      }
    }
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
      if($showAlert) //display form submission alert
      {
        echo 
        '<div class="alert alert-success" role="alert">
          You have successfully signed up with PHP Login System!
        </div>';
      }
      if($showError)
      {
        echo 
        '<div class="alert alert-danger" role="alert">
          Error! '.$showError.'
        </div>';
      }
    ?>

    <!----------Signup form---------->
    <h1 class="mt-5" style="text-align: center;">Signup</h1>
    <form class="mx-auto" id="register-form" action="/php-loginsys/signup.php" method="post">
      <div class="mb-3 mt-5 mx-auto">
        <label for="username" class="form-label">Username </label>
        <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword"> 
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </body>
</html>