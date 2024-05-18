<?php
include('config.php');
include('session.php');

// Check if 'id' index is set in the $_SESSION array
if(isset($_SESSION['session_id'])) {
  $result = $conn->query("SELECT * FROM user WHERE id='" . $_SESSION['session_id'] . "'");
  $row = mysqli_fetch_array($result);
} else {
  // Handle the case when 'id' index is not set
  // Redirect or display an error message
  echo "User ID is not set.";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <title>Installation Table</title>
  <link href="image/finallogo.png" rel="icon">
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body>
<?php include('includes/nav-reader.php');?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Block</th>
                <th>Lot</th>
                <th>Phase</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT p.firstname, p.middlename, p.lastname, p.block, p.lot, p.phase, p.customer_id
                    FROM payment_services AS p
                    GROUP BY p.firstname, p.middlename, p.lastname, p.block, p.lot, p.phase";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["firstname"] . "</td>";
                    echo "<td>" . $row["middlename"] . "</td>";
                    echo "<td>" . $row["lastname"] . "</td>";
                    echo "<td>" . $row["block"] . "</td>";
                    echo "<td>" . $row["lot"] . "</td>";
                    echo "<td>" . $row["phase"] . "</td>";
                    echo "<td><button type='button' class='btn btn-primary view-btn' data-bs-toggle='modal' data-bs-target='#viewModal' 
                                data-firstname='" . $row["firstname"] . "' 
                                data-middlename='" . $row["middlename"] . "' 
                                data-lastname='" . $row["lastname"] . "' 
                                data-block='" . $row["block"] . "' 
                                data-lot='" . $row["lot"] . "' 
                                data-phase='" . $row["phase"] . "' 
                                data-customerId='" . $row["customer_id"] . "'>View</button></td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var viewButtons = document.querySelectorAll('.view-btn');
        viewButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var modalBody = document.getElementById('modalBody');
                var customerId = this.dataset.customerid;

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var materialsData = JSON.parse(xhr.responseText);

                            var tableHTML = `
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name of Materials</th>
                                            <th>Number of Orders</th>
                                            <th>Size</th>
                                            <th>Brand</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;

                            materialsData.forEach(function (material) {
                                tableHTML += `
                                    <tr>
                                        <td>${material.name_of_materials}</td>
                                        <td>${material.number_of_orders}</td>
                                        <td>${material.size}</td>
                                        <td>${material.brand}</td>
                                    </tr>`;
                            });

                            tableHTML += `
                                    </tbody>
                                </table>`;

                            modalBody.innerHTML = tableHTML;
                        } else {
                            console.error('Error: ' + xhr.status);
                        }
                    }
                };

                xhr.open('GET', 'fetch_materials.php?customer_id=' + customerId, true);
                xhr.send();
            });
        });
    });
</script>
</body>
</html>
