<?php
include('config.php');
include('session.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Ensure that the form has been submitted
    if (isset($_POST['selected_materials']) && is_array($_POST['selected_materials'])) {
        $selected_materials = $_POST['selected_materials'];
        $customer_id = $_SESSION['session_id'];

        // Prepare the update statement
        $update_sql = "UPDATE materials SET status = 1 WHERE id = ? AND customer_id = ?";
        $stmt = $conn->prepare($update_sql);

        if ($stmt) {
            $stmt->bind_param("ii", $material_id, $customer_id);

            foreach ($selected_materials as $material_id) {
                // Execute the update for each selected material
                $stmt->execute();
            }

            // Close the statement
            $stmt->close();
        }
    }
}

// Redirect back to the materials page
header('Location: uploadedmaterials.php');
?>
