<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "waternetic");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file upload was successful
    if (isset($_FILES["upload_file"]) && $_FILES["upload_file"]["error"] == 0) {
        // Get file data and name
        $file_data = file_get_contents($_FILES["upload_file"]["tmp_name"]);
        $file_name = $_FILES["upload_file"]["name"];

        // Escape the binary data
        $file_data = mysqli_real_escape_string($con, $file_data);

        // Get the bill type from the hidden input field
        $bill_type = $_POST["bill_type"];

        // Insert data into the financial_reports table
        $insert_query = "INSERT INTO financial_reports (bill_type, file_data, file_name, upload_date) 
                        VALUES ('$bill_type', '$file_data', '$file_name', NOW())";
        mysqli_query($con, $insert_query);

        // Redirect to the appropriate page after successful upload
        header("Location: cashier.php");
        exit();
    } else {
        echo "Error uploading file.";
    }
}

// Close database connection
mysqli_close($con);
?>
