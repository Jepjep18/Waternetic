<?php
include('config.php');
include('session.php');

// Fetch user information
$user_result = $conn->query("SELECT * FROM user WHERE id='" . $_SESSION['session_id'] . "'");
$user_row = mysqli_fetch_array($user_result);

// Fetch statement dates for the logged-in user
$soa_result = $conn->query("SELECT id, statement_date FROM statement_of_account WHERE user_id='" . $_SESSION['session_id'] . "'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Homeowners' Dashboard</title>
    <link href="image/finallogo.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="container">
            <h2 class="text-center">Billing Interface</h2>
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bill Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if there are any statements available
                                if ($soa_result->num_rows > 0) {
                                    // Output data of each row
                                    while ($soa_row = $soa_result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($soa_row['statement_date']) . "</td>";
                                        echo "<td><a class='btn btn-primary' href='viewsoa.php?user_id=" . $_SESSION['session_id'] . "'>Proceed</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='2'>No statements found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
