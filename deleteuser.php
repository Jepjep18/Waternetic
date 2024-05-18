<?php
include('config.php');
include('session.php');

$id = $_GET['id'];

$query = "DELETE FROM user WHERE id = '$id'";
$result = $conn->query($query);

header('location:admin.php');

?>