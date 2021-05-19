<?php
 session_start();

    include ("connection.php");
    include ("functions.php");

   $user_data = check_login($con);

?>
<?php


    $database_name = "Product_details";
    $con = mysqli_connect("localhost","root","",$database_name);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin </title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
         
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h3{
            text-align: right;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        .button {
  			background-color: #f44336;;
  			border: none;
  			color: white;
 			padding: 15px 32px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			float: right;

  		}
  		
  		.container {
		  height: 100px;
		  position: relative;

		}

		.center {
		  margin: 0;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		}

    </style>
</head>
</head>
<body>
<script>
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

        <h2>Admin Page <a class="nav-link button button" type="button" href="logout.php">Log out</a></h2>
        <?php
            $query = "SELECT * FROM product ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                        $row["id"];
                    ?>
                    <div class="col-md-3">

                        <form method="post">
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger">Php <?php echo $row["price"]; ?></h5>
                                <input type="text" name="price" class="form-control" placeholder="">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="submit" name="update" style="margin-top: 5px;" class="btn btn-success left"
                                       value="Edit Price">
                            </div>
                        </form>
                    </div>
                    <?php
                
                }
            }

        ?>

            
        

</body>
</html>

<?php

$database_name = "Product_details";
$con = mysqli_connect("localhost","root","",$database_name);
$result = mysqli_query($con,$query);
if(isset($_POST['update'])){

    $query = "UPDATE `product` SET price ='$_POST[price]' where id='$_POST[id]'";
    $query_run = mysqli_query($con,$query);
    
}

// ?>
// <?php
// header("Location: admin.php")
// ?>