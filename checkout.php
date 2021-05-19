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
        $total = $_POST['total'];
        $query = "insert into receipt (name, address, contact_number, payment, total) values ('$name','$address','$contact_number', '$payment', '$total')";
        mysqli_query($connect, $query);
        header("Location: unset.php");
        die;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        body {
        background-color: radial-gradient(circle, rgba(222,222,222,1) 0%, rgba(203,203,203,1) 100%);
        }
        input{
            width: 20%;
            align-self: center;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: rgb(19,31,40,.9);
            font-size: 30px; 
            background-color: #efefef;
            padding: 2%;
        }
        h3{
            font-family: 'Rubik', sans-serif;
            text-align: right;
            color: rgb(19,31,40,.9);
            background-color: #efefef;
            margin: -0px;
        }
        table th{
            background-color: #efefef;
            margin-top: 20px;
        }
        .table-responsive{
            margin-top: 20px;
            margin-left: 200px;
            margin-right: 200px;
        }
         table{
            background-color: rgba(0,0,0,0.2);
            border-radius: 10px;
        }
        .button2 {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            float: right;
            border-radius:15px;
            width: 180px;

        }
        .button {
            background-color: #555555;
            border: none;
            color: white;
            padding: 15px 32px;
            float: left;
            text-decoration: none;
            font-size: 16px;
            border-radius:15px;

        }
        .container {
          height: 100px;
          left:  -200px;
          position: relative;
        }
        .container2 {
          height: 500px;
          left: 150px;
          position: relative;

        }

        .center {
          margin: 0;
          position: absolute;
          top: 10%;
          left: 50%;
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
        }
         .headertexts{
            text-align: center;
            color: white;
            background-color: rgb(19,31,40,.9);
            height: 160px;
            position: relative;
            top: 0;

        }
        .headertexts h2{
            font-family: Raleway;
            color: rgb(255,189,89);
            margin-top: -30px;
        }
        h2 {
            margin-top: -30px;
            padding-top: 50px;
        }
        h1{
            margin-top: 0;
        }
        .headertexts h1{
            font-family: Raleway;
            padding-top: 10px;
            padding-bottom: 20px;
            font-size: 40px;
            font-weight: bold;
        }
        .top-icons{
            position: absolute;
            top: 10px;
            right: 0;
        }
        .fa-shopping-cart{
            color: #cfcfcf;
        }
        .logout-btn-container a{
            color: radial-gradient(circle, rgba(222,222,222,1) 0%, rgba(203,203,203,1) 100%);
            color: white;
            font-family: 'Roboto', sans-serif;
        }
        .Post{
            margin-right: 500px;
            margin-left: 500px;
        }
        #name, #address, #contact_number, #total{
            height: 40px;
            border-radius: 15px;
            border: 1px solid black;
        }
        #name{
            width: 300px;
        }
        #address{
            width: 400px;
        }
        #contact_number{
            width: 280px;
        }
    </style>
</head>
<body>
<div class="headertexts">
    <h2> You. Us. In Style </h2>
        <h1> KAKE CREATIVES </h1>
    <div>
      <div class="top-icons">
        <div class="nav-item px-lg-4 logout-btn-container">
        <a class="nav-link text-uppercase text-expanded" href="store.html" id="logout-btn">Logout</a>
          </div>
          <div class="nav-item px-lg-4 cart-btn-container">
         <a class="nav-link text-uppercase text-expanded" href="" id="logout-btn"><i class="fas fa-shopping-cart fa-2x"></i></a>
        </div>
      </div>
    </div>
  </div>
            <h3 class="title2">Check Out</h3>
                    <div style="clear: both"></div>
<!--         <h3 class="title2">Shopping Cart Details</h3> -->
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
<!--                 <th width="17%">Remove Item</th> -->
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>Php <?php echo $value["product_price"]; ?></td>
                            <td>
                                Php <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

                        </tr>
                        <?php
                        $total =$total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right"><b>Total</b></td>
                            <th align="right">Php <?php echo number_format($total, 2); ?></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            </div>

         <form class="Post" method="POST">
              <div class="form-group">
                <label for="name">Full Name</label><br>
                <input type="text" name="name" id="name" placeholder="Enter Full Name.." required />
              </div>
              
              <div class="form-group">
                <label for="address">Address</label><br>
                <input type="text" name="address" id="address" placeholder="Enter Address.." required />
              </div>
              <div class="form-group">
                <label for="contact_number">Contact Number</label><br>
                <input type="contact_number" name="contact_number" id="contact_number" placeholder="Enter Contact Number.." required />
              </div>
              <div class="form-group">
                <input type="hidden" value="<?php echo number_format($total, 2); ?>" name="total" id="total" required /> 
              </div>

              Mode of Payment:<br> <select name="payment">
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="GCash"value="user">GCash</option>
          </select>
      <br>
      <br>
            <div class="buttons">
                <a class="nav-link button" type="button" href="products.php"> Edit/Add Order </a>
                <input class="nav-link button2" name="Confirm" type="Submit">
            </div>
              </div>

            </div>
        </div>
    </form>
</body>
</html>
