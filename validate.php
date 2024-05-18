<?php
include("config.php");
include('session.php');

$username = $_POST['username'];
$password = $_POST['password'];
 
$username = mysqli_real_escape_string($conn,$_POST['username']); /* prevents a bit of SQL injection */
$password = mysqli_real_escape_string($conn,$_POST['password']); /* prevents a bit of SQL injection */

$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND usertype='User' AND status='1';";
$user = $conn->query($query);

$query_admin = "SELECT * FROM users WHERE username='$username' AND password='$password' AND usertype='Admin' AND status='1';";
$admin = $conn->query($query_admin);

$query_manager = "SELECT * FROM users WHERE username='$username' AND password='$password' AND usertype='Manager' AND status='1';";
$manager = $conn->query($query_manager);
 
if($user->num_rows == 1) 
{
	while($row = mysqli_fetch_object($user)){
		$_SESSION['users'] = $row->id;
		header("Location:home.php");
	}	
}
elseif($admin->num_rows == 1) 
{
	while($row = mysqli_fetch_object($admin)){
		$_SESSION['users'] = $row->id;
		header("Location:admin.php");
	}
}
elseif($manager->num_rows == 1) 
{
	while($row = mysqli_fetch_object($manager)){
		$_SESSION['users'] = $row->id;
		header("Location:manager.php");
	}
}
else
{
	header('Location: index.php');
}

?>