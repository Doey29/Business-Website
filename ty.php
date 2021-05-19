<?php
 session_start();

    include ("connection.php");
    include ("functions.php");

   $user_data = check_login($con);

?>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "product_details";

if(!$connect = mysqli_connect($host,$user,$pass,$name))
{
    die("failed to connect!");
}

    $connect = mysqli_connect($host,$user,$pass,$name);
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $payment = $_POST['payment'];

        $query = "insert into receipt (name, address, contact_number, payment) values ('$name','$address','$contact_number', '$payment')";
        mysqli_query($connect, $query);
        header("Location: unset.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home KAKE Creatives</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="business-casual.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <style>
      .button {
            background-color: #4CAF50;
            border: none;
            width: 180px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;

        }
  </style>
</head>

<body>
  <div class="headertexts">
    <h2> </h2>
    <h1> THANK YOU FOR PURCHASING! </h1>
    <div>
      <!-- <div class="top-icons">
        <div class="nav-item px-lg-4 logout-btn-container">
          <a class="nav-link text-uppercase text-expanded" href="logout.php" id="logout-btn">Logout</a>
          </div>
          <div class="nav-item px-lg-4 cart-btn-container">
          <a class="nav-link text-uppercase text-expanded" href="cart.php" id="logout-btn"><i class="fas fa-shopping-cart fa-2x"></i></a>
        </div>
      </div> -->
    </div>
  </div>

  <section class="page-section clearfix">
    <div class="container2">
      <div class="intro">
          <img src="KAKE LOGO.png">
     </div>
     <a class="nav-link button button" type="button" href="products.php">Back to site</a>
   </div>
    </div> 
  </section> 
  <footer class="footer text-faded text-center py-4" id="footerhome">
    <div class="container">
      <p class="m-0 small">Copyright &copy; ITCC 2021</p>
   </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
