<?php
session_start();

    include ("connection.php");
    include("functions.php");



    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];
      
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
      {
        //read from database
      $user_id = random_num(20);
      $query = "select * from users where user_name = '$user_name' limit 1";
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);
          
          if ($user_data['password'] === $password)
          {
            if ($_SESSION['user_id'] = $user_data['user_id']){
              echo'<script type="text/javascript">alert("Login Successful!")</script>';
              if ($password && $user_name === ('admin')){
              header("Location: admin.php");
                }else{
                  header("Location: index.php");
                }
            }
          }

        }

        echo '<script language="javascript">';
    echo 'alert("Invalid Username or Password")';
    echo '</script>';
        
      }
      
    }else
    {

    echo '<script language="javascript">';
    echo 'alert("Invalid Username or Password")';
    echo '</script>';
    }

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="bweb2.css">
	<title>Login</title>
</head>
<body>
<div class="background">
<div class="maincontainer">
 <div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__content text-center">
      <img src="KAKE LOGO.png">
      <h2 class="heading--secondary">You. Us. In Style</h2>
    </div>
    <div class="signup__overlay"></div>
  </div>
  <div class="container__child signup__form">
    <div class="titlecontainer">
      <h3>Welcome!</h3>
    </div>
    <form method="POST">
      <div class="form-group1">
        <label for="user_name">Username</label>
        <input class="form-control" type="text" name="user_name" id="user_name" placeholder="Enter Username" required />
      </div>
      <div class="form-group1">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" required />
         <!-- <a class="signup__link" href="passwordrecover.html">forgot password</a> -->
      </div>
      <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="LOG IN" />
          </li>
          <li>
            <a class="signup__link" href="register.php">Create Account</a>
          </li>
        </ul>
      </div>
    </form>  
  </div>
</div>
</div>
</div>



<script src="https://kit.fontawesome.com/01dfed6acd.js" crossorigin="anonymous"></script>"
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="carousel.js"></script>
</body>
</html>