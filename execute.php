<?php
include('config.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["add_material"])) {
    $name_of_materials = $_POST["name_of_materials"];
    $number_of_orders = $_POST["number_of_orders"];
    $size = $_POST["size"];
    $brand = $_POST["brand"];

    // Perform database insert operation
    $sql = "INSERT INTO required_materials (customer_id, name_of_materials, number_of_orders, size, brand) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $id, $name_of_materials, $number_of_orders, $size, $brand);
    $stmt->execute();

    // Redirect to the materials.php page after adding material
    header("Location: userpaymentlist.php?id=" . $id);
    exit();
  }
}
?>
