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
    	@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap');
    	@import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        body {
        	background-image: linear-gradient(rgba(19,31,40,.65),rgba(19,31,40,.65)),url(img/tags.jpeg);
        	background-attachment: fixed;
        	background-position: center;
        	background-size: cover;
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
            color: rgb(19,31,40,.9);
            background: radial-gradient(circle, rgba(222,222,222,1) 0%, rgba(203,203,203,1) 100%);
            padding: 2%;
        }
        .header{
        	font-family: 'Rubik', sans-serif;
        	color: rgb(19,31,40,.9);
             background-color:radial-gradient(circle, rgba(222,222,222,1) 0%, rgba(203,203,203,1) 100%);
            height: 50px;
            width: 100%;
            margin-bottom: 90px;

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
		#cardframe{
		 border-radius: 15px;
		 background-color: white;
		 margin-left: auto;
		 margin-right: auto;
		 width: 400px;
		 margin-top: 20px;
		 box-shadow: 6px 6px 8px rgb(0,0,0,0.4);
		}
		.product{
			padding-top: 10px;
			padding-bottom: 10px;

		}
		.product h5{
			font-family: 'Rubik', sans-serif;

		}
		#abc{
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around; 
			background-color: none;
			width: 1400px;
			height: 1500px;
			margin: 0 auto;
			padding: 0 auto;
		}
		.header a{
			border-radius: 10px;
			justify-content: center;
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
		<div class="header">
        <h2>Admin Page <a class="nav-link button button" type="button" href="logout.php">Log out</a></h2>
   		</div>
   		<div class="centerpage" id="abc">
        	<?php
           		$query = "SELECT * FROM product ORDER BY id ASC ";
            	$result = mysqli_query($con,$query);
            	if(mysqli_num_rows($result) > 0) {

                	while ($row = mysqli_fetch_array($result)) {
                        $row["id"];
                    ?>
                    <div class="col-md-3" id="cardframe">

                        <form method="post">
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger">Php <?php echo $row["price"]; ?></h5>
                                <input type="number" name="price" class="form-control" placeholder="">
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
    </div>

            
        

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