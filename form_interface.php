<?php
// Check if user ID is provided in the URL
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL parameter
    $userId = $_GET['user_id'];

    // Establish a database connection (replace with your database credentials)
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'waternetic';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from water_consumption table based on user ID
    $sql = "SELECT previous_reading_date, previous_reading FROM water_consumption WHERE user_id = $userId ORDER BY previous_reading_date DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Populate Previous Reading Date and Previous Reading fields with retrieved data
        $row = $result->fetch_assoc();
        $previousReadingDate = $row['previous_reading_date'];
        $previousReading = $row['previous_reading'];
    } else {
        // If no data found, initialize fields with empty values
        $previousReadingDate = '';
        $previousReading = '';
    }

    $conn->close();

    // Now, display the form interface
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Water Reading Form</title>
        <link href="image/finallogo.png" rel="icon">

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    </head>

    <body>

        <div class="container">
            <h1>Water Reading Form</h1>
            <form action="submit_reading.php" method="post">
                <!-- Hidden input to pass user ID to the form submission -->
                <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

                <div class="form-group">
                    <label for="previous_reading_date">Previous Reading Date</label>
                    <input type="date" class="form-control" id="previous_reading_date" name="previous_reading_date" value="<?php echo $previousReadingDate; ?>" required>
                </div>

                <div class="form-group">
                    <label for="previous_reading">Previous Reading</label>
                    <input type="number" class="form-control" id="previous_reading" name="previous_reading" value="<?php echo $previousReading; ?>" required>
                </div>

                <div class="form-group">
                    <label for="current_reading_date">Current Reading Date</label>
                    <input type="date" class="form-control" id="current_reading_date" name="current_reading_date" required>
                </div>

                <div class="form-group">
                    <label for="current_reading">Current Reading</label>
                    <input type="number" class="form-control" id="current_reading" name="current_reading" required>
                </div>

                <!-- Label for total water consumption -->
                <div class="form-group">
                    <label for="total_consumption">Total Water Consumption (in liters)</label>
                    <input type="text" class="form-control" id="total_consumption" name="total_consumption" readonly>
                </div>

                <!-- Label for total due for water consumption -->
                <div class="form-group">
                    <label for="total_due">Total Due for Water Consumption</label>
                    <input type="text" class="form-control" id="total_due" name="total_due" readonly>
                </div>

                <!-- Responsive submit button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>


        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            // Calculate total water consumption and total due when input values change
            $(document).ready(function() {
                $('#previous_reading, #current_reading').on('input', function() {
                    var previousReading = parseInt($('#previous_reading').val()) || 0;
                    var currentReading = parseInt($('#current_reading').val()) || 0;
                    var totalConsumption = currentReading - previousReading;
                    $('#total_consumption').val(totalConsumption);

                    // Calculate total due based on consumption rate
                    var rate = 0;
                    if (totalConsumption <= 5) {
                        rate = 108.50;
                    } else if (totalConsumption <= 10) {
                        rate = 21.70;
                    } else if (totalConsumption <= 20) {
                        rate = 23.90;
                    } else if (totalConsumption <= 30) {
                        rate = 26.00;
                    } else if (totalConsumption <= 40) {
                        rate = 28.20;
                    } else {
                        rate = 30.40;
                    }
                    var totalDue = totalConsumption * rate;
                    $('#total_due').val(totalDue.toFixed(2));
                });
            });
        </script>
    </body>

    </html>
<?php
} else {
    // Redirect the user if user ID is not provided
    header("Location: homeowners_list.php");
    exit();
}
?>