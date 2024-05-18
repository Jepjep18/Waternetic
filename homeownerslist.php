<?php
	include('config.php');
	include('session.php');
	
	$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homeowners List</title>
  <link href="image/finallogo.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  
  
  
  <script>
  // JavaScript function to handle button click and get user ID
  function proceed(userId) {
    // You can perform any action with the user ID here
    alert("Proceed button clicked for user ID: " + userId);
    // For example, you can make an AJAX request to perform further actions with this user ID
  }
</script>

</head>
<body>
<?php include('includes/nav-reader.php');?>

  <div class="container">
    <h1>Homeowners List</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Block</th>
          <th>Lot</th>
          <th>Phase</th>
          <th>Action</th> <!-- New column for action button -->

        </tr>
      </thead>
      <tbody id="homeowners-list">
        <!-- Data will be populated here -->
        <?php include 'fetch_homeowners.php'; ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
