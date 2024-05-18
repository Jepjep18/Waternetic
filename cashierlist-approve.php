<?php
include("config.php");


$sql = "UPDATE payment_services SET status='1' WHERE id ='$id'";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Homeowners successfully added!");';
	echo 'window.location="cashier.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="approve.php";';
	echo '</script>';
}
?>