<?php
include('config.php');
include('session.php');
	
	$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
	$row = mysqli_fetch_array($result);

// Select all payments from the database
$sql = "SELECT * FROM payment_services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin's Payment List</title>
  <link href="image/finallogo.png" rel="icon">

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
</head>
<body>
<?php include('includes/nav-admin.php');?>

<div class="container">
  <h1 class="my-3">User Payment List</h1>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Type of Payment</th>
        <th>Block</th>
        <th>Lot</th>
        <th>Phase</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = $result->fetch_assoc()): ?>
      <?php if ($row['bill_type'] === 'installation'): ?>
        <tr>
          <td><?php echo $row['firstname']; ?></td>
          <td><?php echo $row['middlename']; ?></td>
          <td><?php echo $row['lastname']; ?></td>
          <td><?php echo $row['bill_type']; ?></td>
          <td><?php echo $row['block']; ?></td>
          <td><?php echo $row['lot']; ?></td>
          <td><?php echo $row['phase']; ?></td>
          <td><?php echo $row['amount']; ?></td>
          <td><?php echo $row['real_timestamp']; ?></td>
          <td>
            <a href="materials.php?id=<?php echo $row['customer_id']; ?>">
              <button class="btn btn-primary">Proceed</button>
            </a>
          </td>
        </tr>
      <?php endif; ?>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>


  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>


</body>
</html>
