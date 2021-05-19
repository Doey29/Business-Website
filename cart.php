<?php
 session_start();

    include ("connection.php");
    include ("functions.php");

   $user_data = check_login($con);

?>
<?php

    $database_name = "Product_details";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed.")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        body {
           /* background-image: linear-gradient(rgba(19,31,40,.65),rgba(19,31,40,.65)),url(img/tags.jpeg);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            */
            background-color: radial-gradient(circle, rgba(222,222,222,1) 0%, rgba(203,203,203,1) 100%);
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
        .button {
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

  		}
  		.button2 {
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

		.center {
		  margin: 0;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  /*-ms-transform: translate(-50%, -50%);*/
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

    </style>
</head>
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
<script>
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

        <div style="clear: both"></div>
        <h3 class="title2">My Shopping Cart</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%"></th>
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
                            <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Sub Total</td>
                            <th align="right">Php <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            <div class="buttons">
            <a class="nav-link button button1" type="button" href="checkout.php">Checkout</a>
			 <a class="nav-link button button2" type="button" href="products.php">Back to Site..</a>
            </div>
            </div>

    </div>


</body>
</html>