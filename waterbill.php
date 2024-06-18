<?php
include('config.php');
include('session.php');

$result = $conn->query("SELECT * FROM user WHERE id='" . $_SESSION['session_id'] . "'");
$row = mysqli_fetch_array($result);

$userID = $_SESSION['session_id'];

// Retrieve user information
$query_user = "SELECT * FROM user WHERE id = ?";
$stmt_user = $pdo->prepare($query_user);
$stmt_user->bindParam(1, $userID);
$stmt_user->execute();
$row_user = $stmt_user->fetch(PDO::FETCH_ASSOC);

// Retrieve previous reading and its date
$query_previous_reading = "SELECT previous_reading, previous_reading_date FROM water_consumptionn WHERE user_id = ? ORDER BY id DESC LIMIT 1";
$stmt_previous_reading = $pdo->prepare($query_previous_reading);
$stmt_previous_reading->bindParam(1, $userID);
$stmt_previous_reading->execute();
$row_previous_reading = $stmt_previous_reading->fetch(PDO::FETCH_ASSOC);

// Define $previousReading and $previousReadingDate
$previousReading = $row_previous_reading['previous_reading'] ?? '';
$previousReadingDate = $row_previous_reading['previous_reading_date'] ?? '';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Water Bill Form</title>
    <link href="image/finallogo.png" rel="icon">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            /* Adjust the maximum width as needed */
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            /* Increase border-radius for a more rounded shape */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
        }

        .btn-primary {
            width: 100%;
        }
    </style>

    <script>
        function calculateWaterConsumption() {
            var previous_reading = parseInt(document.getElementById("previous_reading").value);
            var present_reading = parseInt(document.getElementById("present_reading").value);

            if (!isNaN(previous_reading) && !isNaN(present_reading)) {
                var totalWaterConsumption = present_reading - previous_reading;
                document.getElementById("totalWaterConsumption").value = totalWaterConsumption;

                // Send the form data to save_calculation.php using AJAX
                var formData = new FormData(document.getElementById("waterBillForm"));
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            // Display success message or handle response as needed
                            alert(xhr.responseText);
                        } else {
                            // Display error message or handle error as needed
                            alert("Error: " + xhr.responseText);
                        }
                    }
                };
                xhr.open("POST", "save_calculation.php", true);
                xhr.send(formData);
            }
        }
    </script>

</head>

<body>

    <?php include('includes/nav-user.php'); ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Water Bill Calculator</h2>
        <form id="waterBillForm" action="submitwaterconsumption.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $row_user['firstname']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="middleName">Middle Name:</label>
                        <input type="text" id="middleName" name="middleName" class="form-control" value="<?php echo $row_user['middlename']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $row_user['lastname']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="block">Block:</label>
                        <input type="text" id="block" name="block" class="form-control" value="<?php echo $row_user['block']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lot">Lot:</label>
                        <input type="text" id="lot" name="lot" class="form-control" value="<?php echo $row_user['lot']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phase">Phase:</label>
                        <input type="text" id="phase" name="phase" class="form-control" value="<?php echo $row_user['phase']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="previous_reading">Previous Reading :</label>
                        <div class="input-group">
                            <input type="number" id="previous_reading" name="previous_reading" class="form-control" value="<?php echo $previousReading; ?>" readonly>
                            <span class="input-group-text">m³</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="previous_reading_date">Previous Reading Date:</label>
                        <input type="text" id="previous_reading_date" name="previous_reading_date" class="form-control" value="<?php echo $previousReadingDate; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="present_reading">Present Reading :</label>
                        <div class="input-group">
                            <input type="number" id="present_reading" name="present_reading" class="form-control" required>
                            <span class="input-group-text">m³</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="present_reading_date">Present Reading Date:</label>
                        <input type="text" id="present_reading_date" name="present_reading_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="totalWaterConsumption">Total Water Consumption :</label>
                        <div class="input-group">
                            <input type="text" id="totalWaterConsumption" name="totalWaterConsumption" class="form-control" readonly>
                            <span class="input-group-text">m³</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="waterBillFile">Upload Water Bill (PDF, Image, etc.):</label>
                        <input type="file" name="file" class="form-control" id="waterBillFile">
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" onclick="calculateWaterConsumption()">Calculate</button>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>