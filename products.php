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
                echo '<script>alert("Item(s) Added.")</script>';
                echo '<script>window.location="products.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="products.php"</script>';
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
                    echo '<script>window.location="products.php"</script>';
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Products KAKE Creatives</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="business-casual.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <div class="headertexts">
    <h2> You. Us. In Style </h2>
    <h1> KAKE CREATIVES </h1>
    <div>
      <div class="top-icons">
        <div class="nav-item px-lg-4 logout-btn-container">
        <a class="nav-link text-uppercase text-expanded" href="logout.php" id="logout-btn">Logout</a>
          </div>
          <div class="nav-item px-lg-4 cart-btn-container">
         <a class="nav-link text-uppercase text-expanded" href="cart.php" id="logout-btn"><i class="fas fa-shopping-cart fa-2x"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">NAVIGATION BARS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="about.php">About</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="products.php">Products</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="store.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="exercise">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
            $query = "SELECT * FROM product ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {
              
                while ($row = mysqli_fetch_array($result)) {

                    ?>
    <div class="col">
      <div class="card">
        <form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
        <div class="img1" style="width:100%; text-align:center;">
          <img src="<?php echo $row["image"]; ?>" alt="" class="center">
           <div class="overlay">
             <div class="text">
              <button type="button" class="btn btn-outline-light"id="button<?php echo $row["id"]; ?>">See Details</button>
             </div>
            </div>
          </div>
        <div class="img2"><img src="<?php echo $row["image"]; ?>" alt=""></div>
          <div class="main-text">
            <h1><?php echo $row["pname"]; ?></h1>

            <p class="card-text"> <b><?php echo $row["ptype"]; ?></b> <br>Php <?php echo $row["price"]; ?></p>
            <input type="hidden" name="hidden_name" value="<?php  echo $row["pname"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="hidden" name="quantity" class="form-control" value="1">
            <button type="submit" name="add" class="btn-cart" >Add to Cart</button>

          </div>
        </div>
      </div>

<div class="bg-modal" id="modal<?php echo $row["id"]; ?>">
  <form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
  <div class="modal-content">
    <div class="leftcontent">
      <img src="img/img<?php echo $row["id"]; ?>.png" class="infoimg">
    </div>
    <div class="rightcontent">
      <div class="xbutton">
      <div class="closebutton" id="close<?php echo $row["id"]; ?>">+</div>
      </div>
      <div class="info" align="left">
      <h1><?php echo $row["pname"]; ?></h1>
      <h2><?php echo $row["ptype"]; ?></h2>
      <h3>Available Colors:</h3>
      </div>
      <div class="colors" align="left">
      <img src="img/colorall.png" class="availcolors">
      </div>
      <div class="Addtocart">
      <input type="hidden" name="hidden_name" value="<?php  echo $row["pname"]; ?>">
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
      <input type="number" name="quantity" class="form-control" value="1" >
      <br>
      <button type="submit" name="add" class="btn-cart" >Add to Cart</button>
      </div>
    </div>
  </div>
</div>
  </form>
        </form>
      <?php 
    }
  }
  ?>
</div>
</div>


</div>
</div>
  <footer class="footer text-faded text-center py-4" id="footerproducts">
    <div class="containerfooter">
      <p class="m-0 small">Copyright &copy; ITCC 2021</p>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bweb.js"></script>
</body>
</html>
