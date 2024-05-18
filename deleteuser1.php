<?php
// Include your database connection file here
$id = $_GET['id']; // Assuming id is passed via GET method

// Perform delete query
// Example: 
$query = "DELETE FROM report_issue WHERE id = $id";
// Execute your query here

// Redirect back to the page where you came from
header("Location: admin.php");
exit;
?>
