<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waternetic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch homeowners where usertype is 'user'
$sql = "SELECT * FROM user WHERE usertype = 'User'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["middlename"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["block"] . "</td>";
        echo "<td>" . $row["lot"] . "</td>";
        echo "<td>" . $row["phase"] . "</td>";
        // Pass user ID to JavaScript function when button is clicked
        echo "<td><button class='btn btn-primary' onclick='proceed({$row['id']})'>Proceed</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No homeowners found.</td></tr>";
}
$conn->close();
?>
