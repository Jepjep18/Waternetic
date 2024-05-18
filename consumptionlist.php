<?php
include('config.php');
include('session.php');

if(isset($_SESSION['session_id'])) {
    $result = $conn->query("SELECT * FROM user WHERE id='" . $_SESSION['session_id'] . "'");
    $row_user = mysqli_fetch_array($result);
} else {
    echo "User ID is not set.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Water Consumption List</title>
    <link href="image/finallogo.png" rel="icon">

    <!-- Bootstrap 5 CSS -->
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<?php include('includes/nav-reader.php');?>

<div class="container">
    <h1 class="my-3">Water Consumption</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Block</th>
            <th>Lot</th>
            <th>Phase</th>
            <th>Previous Reading</th>
            <th>Present Reading</th>
            <th>Total Water Consumption</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT wc.previous_reading, wc.present_reading, wc.total_consumption, wc.file_path,
                       u.id as user_id, u.firstname, u.middlename, u.lastname, u.block, u.lot, u.phase
                FROM water_consumption wc
                JOIN user u ON wc.user_id = u.id";
        $result = mysqli_query($conn, $sql);

        // Output data from each row
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["middlename"] . "</td>";
                echo "<td>" . $row["lastname"] . "</td>";
                echo "<td>" . $row["block"] . "</td>";
                echo "<td>" . $row["lot"] . "</td>";
                echo "<td>" . $row["phase"] . "</td>";
                echo "<td>" . $row["previous_reading"] . "</td>";
                echo "<td>" . $row["present_reading"] . "</td>";
                echo "<td>" . $row["total_consumption"] . "</td>";
                echo "<td>" . $row["file_path"] . "</td>";
                echo "<td>
                    <a href='soa.php?user_id=" . $row["user_id"] . "'>
                        <button class='btn btn-primary'>Proceed</button>
                    </a>
                </td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No water consumption records found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
