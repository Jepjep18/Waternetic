<?php
include('config.php');
include('session.php');

$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
	$row = mysqli_fetch_array($result);

if(isset($_GET['id'])) {
    $billId = $_GET['id'];

    // Update payment status to 'paid'
    $updateQuery = "UPDATE water_consumptionn SET payment_status = 'paid' WHERE id = ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(1, $billId);
    $updateStmt->execute();
}

$userID = $_SESSION['session_id'];

$query = "SELECT id, previous_reading, current_reading, previous_reading_date, current_reading_date, total_consumption, total_due, submission_date, payment_status FROM water_consumptionn WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $userID);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>

<?php include('includes/nav-user.php');?>

    <div class="container mt-5">
        <h2>Billing Interface</h2>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Previous Reading</th>
                    <th>Previous Reading Date</th>
                    <th>Current Reading</th>
                    <th>Current Reading Date</th>
                    <th>Total Consumption</th>
                    <th>Total Due</th>
                    <th>Submission Date</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($results) {
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['previous_reading'] . "</td>";
                        echo "<td>" . $row['previous_reading_date'] . "</td>";
                        echo "<td>" . $row['current_reading'] . "</td>";
                        echo "<td>" . $row['current_reading_date'] . "</td>";
                        echo "<td>" . $row['total_consumption'] . "</td>";
                        echo "<td>" . $row['total_due'] . "</td>";
                        echo "<td>" . $row['submission_date'] . "</td>";
                        // Determine color based on payment status
                        $color = ($row['payment_status'] == 'paid') ? 'green' : 'red';
                        echo "<td style='color: $color'>" . ucfirst($row['payment_status']) . "</td>";
                        echo "<td><a class='btn btn-primary' href='waterbill.php?id=" . $row['id'] . "&previous_reading=" . $row['previous_reading'] . "'>Calculate</a></td>";
                        echo "<td><a class='btn btn-primary' href='waterbill_payment.php?id=" . $row['id'] . "&total_due=" . $row['total_due'] . "'>Pay</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No data found for the logged-in user.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
