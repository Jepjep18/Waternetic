<?php
include('config.php');

$id = $_GET['id']; // Assuming id is passed via GET method

// Perform update query to change status from 0 to 1
$query = "UPDATE report_issue SET status = '1' WHERE id = $id"; // Corrected variable name to $query
if(mysqli_query($conn, $query)){ // Corrected variable name to $query
    echo '<script language="javascript">';
    echo 'alert("Status updated successfully!");';
    echo 'window.location="admin.php";';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Error updating status!");';
    echo 'window.location="approve.php";';
    echo '</script>';
}
?>
