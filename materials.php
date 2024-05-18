<?php
include('config.php');

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM user WHERE id='$id'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Materials Table</title>
  <link href="image/finallogo.png" rel="icon">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h1>Materials</h1>
    <table class="table table-bordered">
      <tr>
        <td>Last Name: <?php echo $row['lastname']; ?></td>
        <td>First Name: <?php echo $row['firstname']; ?></td>
        <td>Middle Name: <?php echo $row['middlename']; ?></td>
      </tr>
    </table>
</div>

<div class="container mt-4">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Material
  </button>

  <table class="table table-bordered">
    <thead>
    <tr>
      
      <th>Name of Materials</th>
      <th>Number of Orders</th>
      <th>Size</th>
      <th>Brand</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Fetch materials data from the database
    $sql = "SELECT * FROM materials WHERE customer_id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        echo "<td>" . $row["name_of_materials"] . "</td>";
        echo "<td>" . $row["number_of_orders"] . "</td>";
        echo "<td>" . $row["size"] . "</td>";
        echo "<td>" . $row["brand"] . "</td>";
        echo "<td>
          <form method='post' action='materials.php?id=" . $id . "'>
            <input type='hidden' name='material_id' value='" . $row["id"] . "'>
            <input type='submit' class='btn btn-sm btn-primary' name='edit_material' value='Edit'>
            <input type='submit' class='btn btn-sm btn-danger' name='delete_material' value='Delete'>
          </form>
        </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='7'>No materials found.</td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["add_material"])) {
    $name_of_materials = $_POST["name_of_materials"];
    $number_of_orders = $_POST["number_of_orders"];
    $size = $_POST["size"];
    $brand = $_POST["brand"];

    $sql = "INSERT INTO materials (customer_id, name_of_materials, number_of_orders, size, brand) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $id, $name_of_materials, $number_of_orders, $size, $brand);
    $stmt->execute();

    // Redirect to the same page after adding material
    header("Location: materials.php?id=" . $id);
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
    header("Location: materials.php?id=" . $id);
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
    header("Location: materials.php?id=" . $id);
    exit();
  }
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" enctype="multipart/form-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Add Material</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="inputNameOfMaterials" class="form-label">Name of Materials</label>
            <input type="text" name="name_of_materials" class="form-control" id="inputNameOfMaterials" placeholder="Name of Materials">
          </div>
          <div class="mb-3">
            <label for="inputNumberOfOrders" class="form-label">Number of Orders</label>
            <input type="text" name="number_of_orders" class="form-control" id="inputNumberOfOrders" placeholder="Number of Orders">
          </div>
          <div class="mb-3">
            <label for="inputSize" class="form-label">Size</label>
            <input type="text" name="size" class="form-control" id="inputSize" placeholder="Size">
          </div>
          <div class="mb-3">
            <label for="inputBrand" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" id="inputBrand" placeholder="Brand">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add_material" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </form>
</div>


<!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
ob_end_flush(); // Flush output buffer
?>
