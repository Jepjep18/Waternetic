<?php
// Database connection parameters
$host = "localhost"; // Replace with your actual host name
$username = "root"; // Replace with your actual username
$password = ""; // Replace with your actual password
$dbname = "waternetic"; // Replace with your actual database name

// Create a new MySQLi instance
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notifications
$sql = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

$output = '<h6 class="dropdown-header">Alerts Center</h6>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">' . $row["created_at"] . '</div>
                <span class="font-weight-bold">' . $row["message"] . '</span>
            </div>
        </a>';
    }
} else {
    $output .= '<a class="dropdown-item text-center small text-gray-500" href="#">No notifications</a>';
}

echo $output;

$conn->close();
?>
