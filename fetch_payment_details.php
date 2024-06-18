<?php
include('config.php');

$id = $_GET['id'];

// Fetch payment service data from the 'payment_services' table based on the provided ID
$query = "SELECT * FROM payment_services WHERE id = '$id'";
$result = mysqli_fetch_array(mysqli_query($conn, $query));

if ($result) {
  echo '<div class="mb-3">
          <label for="or-number" class="form-label">OR Number:</label>
          <input type="text" id="or-number" name="or_number" class="form-control" required>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" id="id" name="id" class="form-control" value="' . $result['id'] . '" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="' . $result['firstname'] . '" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="middle-name" class="form-label">Middle Name:</label>
            <input type="text" id="middle-name" name="middle_name" class="form-control" value="' . $result['middlename'] . '" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="last-name" class="form-label">Last Name:</label>
            <input type="text" id="last-name" name="last_name" class="form-control" value="' . $result['lastname'] . '" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="bill_type" class="form-label">Type of Payments:</label>
            <input type="text" id="bill_type" name="bill_type" class="form-control" value="' . $result['bill_type'] . '" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="block" class="form-label">Block:</label>
            <input type="text" id="block" name="block" class="form-control" value="' . $result['block'] . '" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lot" class="form-label">Lot:</label>
            <input type="text" id="lot" name="lot" class="form-control" value="' . $result['lot'] . '" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="phase" class="form-label">Phase:</label>
            <input type="text" id="phase" name="phase" class="form-control" value="' . $result['phase'] . '" readonly>
          </div>
        </div>
        <div class="input-group">
          <span class="input-group-text">₱</span>
          <input type="text" id="amount" name="amount" class="form-control" value="' . number_format($result['amount'], 2) . '" readonly>
        </div>';
}
?>
