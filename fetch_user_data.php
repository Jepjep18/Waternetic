<?php
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'waternetic';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT previous_reading_date, previous_reading FROM water_consumption WHERE user_id = $userId ORDER BY previous_reading_date DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $previousReadingDate = $row['previous_reading_date'];
        $previousReading = $row['previous_reading'];
    } else {
        $previousReadingDate = '';
        $previousReading = '';
    }

    $conn->close();
?>
    <form action="submit_reading.php" method="post">
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

        <div class="form-group">
            <label for="total_consumption">Total Water Consumption (in liters)</label>
            <input type="text" class="form-control" id="total_consumption" name="total_consumption" readonly>
        </div>

        <div class="form-group">
            <label for="total_due">Total Due for Water Consumption</label>
            <input type="text" class="form-control" id="total_due" name="total_due" readonly>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#previous_reading, #current_reading').on('input', function() {
                var previousReading = parseInt($('#previous_reading').val()) || 0;
                var currentReading = parseInt($('#current_reading').val()) || 0;
                var totalConsumption = currentReading - previousReading;
                $('#total_consumption').val(totalConsumption);

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
                $('#total_due').val('₱' + totalDue.toFixed(2));
            });
        });
    </script>
<?php
}
?>
