<?php
session_start();

unset($_SESSION['cart']);
header("Location: ty.php");
?>
echo '<script language="javascript">';
		echo 'alert("Invalid Username or Password")';
		echo '</script>';