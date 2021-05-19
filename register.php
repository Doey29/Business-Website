<?php
session_start();

    include ("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];
      $password1 = $_POST['password1'];

      $user_id = random_num(20);
      $query = "insert into users (user_id, user_name, password, password1) values ('$user_id', '$user_name', '$password', '$password1')";
      mysqli_query($con, $query);

      header("Location: login.php");
      die;
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
	<link rel="stylesheet" href="bweb.css">
	<title>Register</title>
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
      <h3>Registration</h3>
    </div>
    <form method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="user_name" id="username" placeholder="NeilKass.chiong" required />
      </div>
      <!-- <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email" placeholder="Neilkassandra.chiong@gmail.com" required />
      </div> -->
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="********" required />
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input class="form-control" type="password" name="password1" id="password" placeholder="********" required />
      </div>
      <div class="form-group2">
      </div>
      <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="SIGN UP" />
          </li>
          <li>
            <a class="signup__link" href="login.php">Already have an account</a>
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