<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["selected_materials"]) && is_array($_POST["selected_materials"])) {
    $selectedMaterials = $_POST["selected_materials"];

    // Update the status of selected materials to 0
    foreach ($selectedMaterials as $materialId) {
      // Perform the necessary operations with the selected materials
      // For example, you can insert the selected materials into another table or perform other database operations
      // You can access the material details using $materialId and retrieve the corresponding data from the materials table

      // Sample code to update the status to 0 in the materials table
      $updateQuery = "UPDATE materials SET status = 0 WHERE id = '$materialId'";
      $conn->query($updateQuery);

      // Sample code to retrieve material details from the materials table
      $materialQuery = "SELECT * FROM materials WHERE id = '$materialId'";
      $materialResult = $conn->query($materialQuery);

      if ($materialResult && $materialResult->num_rows > 0) {
        $materialData = $materialResult->fetch_assoc();
        $customerId = $materialData["customer_id"];
        $materialName = $materialData["name_of_materials"];
        $numberOfOrders = $materialData["number_of_orders"];
        $size = $materialData["size"];
        $brand = $materialData["brand"];

        // Insert the material data into the update_materials table
        $insertQuery = "INSERT INTO updated_materials (customer_id, name_of_materials, number_of_orders, size, brand) VALUES ('$customerId', '$materialName', '$numberOfOrders', '$size', '$brand')";
        $conn->query($insertQuery);
      }
    }

    // Redirect to a success page or perform any other desired action
    header("Location: user.php");
    exit();
  }
}
?>
