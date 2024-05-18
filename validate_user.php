<?php
include("config.php");
include('session.php');

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn, $username); /* prevents a bit of SQL injection */
$password = mysqli_real_escape_string($conn, $password); /* prevents a bit of SQL injection */

$query = "SELECT * FROM user WHERE username='$username' AND usertype='User' AND status=1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        $_SESSION['session_id'] = $row['id'];
        header("Location: user.php");
    } else {
        header('Location: index.php');
    }
} else {
    // Check for other usertypes
    $query_admin = "SELECT * FROM user WHERE username='$username' AND password='$password' AND usertype='Admin'";
    $admin = $conn->query($query_admin);

    $query_manager = "SELECT * FROM user WHERE username='$username' AND password='$password' AND usertype='Manager'";
    $manager = $conn->query($query_manager);

    $query_reader = "SELECT * FROM user WHERE username='$username' AND password='$password' AND usertype='Reader'";
    $reader = $conn->query($query_reader);

    $query_plumber = "SELECT * FROM user WHERE username='$username' AND password='$password' AND usertype='Plumber'";
    $plumber = $conn->query($query_plumber);

    $query_owner = "SELECT * FROM user WHERE username='$username' AND password='$password' AND usertype='Owner'";
    $owner = $conn->query($query_owner);

    if ($admin->num_rows == 1) {
        while ($row = mysqli_fetch_object($admin)) {
            $_SESSION['session_id'] = $row->id;
            header("Location: admin.php");
        }
    } elseif ($manager->num_rows == 1) {
        while ($row = mysqli_fetch_object($manager)) {
            $_SESSION['session_id'] = $row->id;
            header("Location: cashier.php");
        }
    } elseif ($reader->num_rows == 1) {
        while ($row = mysqli_fetch_object($reader)) {
            $_SESSION['session_id'] = $row->id;
            header("Location: reader.php");
        }
    } elseif ($plumber->num_rows == 1) {
        while ($row = mysqli_fetch_object($plumber)) {
            $_SESSION['session_id'] = $row->id;
            header("Location: plumber.php");
        }
    } elseif ($owner->num_rows == 1) {
        while ($row = mysqli_fetch_object($owner)) {
            $_SESSION['session_id'] = $row->id;
            header("Location: owner.php");
        }
    }
    else {
        header('Location: index.php');
    }
}
?>