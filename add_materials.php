<?php
include('config.php');
// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["add_material"])) {
    $name_of_materials = $_POST["name_of_materials"];
    $number_of_orders = $_POST["number_of_orders"];
    $size = $_POST["size"];
    $brand = $_POST["brand"];

    $sql = "INSERT INTO materials (name_of_materials, number_of_orders, size, brand, customer_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name_of_materials, $number_of_orders, $size, $brand, $customerid);
    $stmt->execute();

    // Redirect to the same page after adding material
    header("Location: materials.php?id=" . $userid);
    exit();
  }

  // Edit Material
  if (isset($_POST["edit_material"])) {
    $material_id = $_POST["material_id"];
    $name_of_materials = $_POST["name_of_materials"];
    $number_of_orders = $_POST["number_of_orders"];
    $size = $_POST["size"];
    $brand = $_POST["brand"];

    $sql = "UPDATE materials SET name_of_materials=?, number_of_orders=?, size=?, brand=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name_of_materials, $number_of_orders, $size, $brand, $material_id);
    $stmt->execute();

    // Redirect to the same page after editing material
    header("Location: materials.php?id=" . $userid);
    exit();
  }

  // Delete Material
  if (isset($_POST["delete_material"])) {
    $material_id = $_POST["material_id"];

    $sql = "DELETE FROM materials WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $material_id);
    $stmt->execute();

    // Redirect to the same page after deleting material
    header("Location: materials.php?id=" . $userid);
    exit();
  }
}
?>