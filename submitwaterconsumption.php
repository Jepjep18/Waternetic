<?php
include('config.php');
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION['session_id'];
    $present_reading = $_POST['present_reading'];
    $present_reading_date = $_POST['present_reading_date'];
    $totalWaterConsumption = $_POST['totalWaterConsumption'];
    $previous_reading = $_POST['previous_reading'];
    $previous_reading_date = $_POST['previous_reading_date'];

    // Upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    // Insert data into water consumption table
    $query_insert = "INSERT INTO water_consumption (user_id, previous_reading, previous_reading_date, present_reading, present_reading_date, total_consumption, file_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $pdo->prepare($query_insert);
    $stmt_insert->bindParam(1, $userID);
    $stmt_insert->bindParam(2, $previous_reading);
    $stmt_insert->bindParam(3, $previous_reading_date);
    $stmt_insert->bindParam(4, $present_reading);
    $stmt_insert->bindParam(5, $present_reading_date);
    $stmt_insert->bindParam(6, $totalWaterConsumption);
    $stmt_insert->bindParam(7, $target_file);
    $stmt_insert->execute();

    // Redirect to success page
    header("Location: user.php");
    exit();
} else {
    // Redirect to error page if accessed directly
    header("Location: error.php");
    exit();
}
?>
