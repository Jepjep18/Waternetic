<?php
include('config.php');
include('session.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM payment_services WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $customerID = $row['customer_id'];
        $firstName = $row['firstname'];
        $middleName = $row['middlename'];
        $lastName = $row['lastname'];
        $block = $row['block'];
        $lot = $row['lot'];
        $phase = $row['phase'];
        $materials = $row['name_of_materials'];
        $orders = $row['number_of_orders'];
        $size = $row['size'];
        $brand = $row['brand'];
        $installed = $row['installed'];
        
        $insertSql = "INSERT INTO installed_clients (customer_id, firstname, middlename, lastname, block, lot, phase, name_of_materials, number_of_orders, size, brand, installed)
                      VALUES ('$customerID', '$firstName', '$middleName', '$lastName', '$block', '$lot', '$phase', '$materials', '$orders', '$size', '$brand', '$installed')";
        
        if (mysqli_query($conn, $insertSql)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    } else {
        echo "No data found for the provided ID.";
    }
} else {
    echo "ID parameter is not set.";
}
?>
