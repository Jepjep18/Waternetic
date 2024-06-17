<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Your head content here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cashier's Payment List</title>
  <link href="image/finallogo.png" rel="icon">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fc;
    }
    .container {
      margin-top: 30px;
    }
    .form-control {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="my-3">User Payment List</h1>

    <!-- Filtering Options -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="searchInput">Search:</label>
        <input type="text" id="searchInput" class="form-control" placeholder="Type here...">
      </div>
      <div class="col-md-6">
        <label for="billTypeInput">Filter by Type of Payment:</label>
        <input type="text" id="billTypeInput" class="form-control" placeholder="Type here...">
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Surname</th>
          <th>Type of Payment</th>
          <th>Block</th>
          <th>Lot</th>
          <th>Phase</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody id="paymentList">
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

        $sql = "SELECT id, firstname, middlename, lastname, bill_type, block, lot, phase, amount, real_timestamp, status 
        FROM payment_services WHERE status = 0 ORDER BY status ASC";
        $result = mysqli_query($conn, $sql);

        // Output data from each row
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $button_label = "Proceed";
            echo "<tr>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["middlename"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["bill_type"] . "</td>";
            echo "<td>" . $row["block"] . "</td>";
            echo "<td>" . $row["lot"] . "</td>";
            echo "<td>" . $row["phase"] . "</td>";
            $formatted_amount = '₱' . number_format($row["amount"], 2, '.', ','); // Assuming amount is in decimal format
            echo "<td>" . $formatted_amount . "</td>";            echo "<td>" . $row["real_timestamp"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='10'>No payment records found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JavaScript to filter results dynamically -->
  <script>
    // Function to filter the table rows based on search input
    function filterTable() {
      var searchInput = document.getElementById('searchInput').value.toLowerCase();
      var billTypeInput = document.getElementById('billTypeInput').value.toLowerCase();
      var rows = document.getElementById('paymentList').getElementsByTagName('tr');

      for (var i = 0; i < rows.length; i++) {
        var firstName = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
        var lastName = rows[i].getElementsByTagName('td')[2].innerText.toLowerCase();
        var block = rows[i].getElementsByTagName('td')[4].innerText.toLowerCase();
        var lot = rows[i].getElementsByTagName('td')[5].innerText.toLowerCase();
        var phase = rows[i].getElementsByTagName('td')[6].innerText.toLowerCase();
        var billType = rows[i].getElementsByTagName('td')[3].innerText.toLowerCase();

        if (firstName.includes(searchInput) || lastName.includes(searchInput) || block.includes(searchInput) || lot.includes(searchInput) || phase.includes(searchInput)) {
          if (billType.includes(billTypeInput) || billTypeInput === '') {
            rows[i].style.display = '';
          } else {
            rows[i].style.display = 'none';
          }
        } else {
          rows[i].style.display = 'none';
        }
      }
    }

    // Add event listeners to input fields for filtering
    document.getElementById('searchInput').addEventListener('input', filterTable);
    document.getElementById('billTypeInput').addEventListener('input', filterTable);
  </script>
</body>
</html>
