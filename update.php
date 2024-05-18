<?php
include("config.php");

$id = $_GET['id'];

$sql = "UPDATE user SET status='1' WHERE id ='$id'";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Homeowners successfully added!");';
	echo 'window.location="admin.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="approve.php";';
	echo '</script>';
}
?>