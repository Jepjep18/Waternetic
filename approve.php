<?php
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="css/approve.css">

</head>
<body>
<div class="container">
		<h1>User List</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>User_id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Block</th>
					<th>Lot</th>
					<th>Phase</th>
					<th>Photo</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Execute query
				$sql = "SELECT user_id , firstname, lastname, block, lot, phase, photo, status FROM users WHERE status='0' ORDER BY status ASC";
				$result = mysqli_query($conn, $sql);

				// Output data from each row
				if (mysqli_num_rows($result) > 0) {
				  while($row = mysqli_fetch_assoc($result)) {
				    $button_label = ($row["status"] == 1) ? "Active" : "Approve";
					$image_path = 'upload/' . $row['photo'];
					
				    echo "<tr>";
				    echo "<td>" . $row["user_id"] . "</td>";
				    echo "<td>" . $row["firstname"] . "</td>";
				    echo "<td>" . $row["lastname"] . "</td>";
				    echo "<td>" . $row["block"] . "</td>";
				    echo "<td>" . $row["lot"] . "</td>";
				    echo "<td>" . $row["phase"] . "</td>";
				    echo "<td><img src='$image_path' style='max-height: 100px;'></td>";
				    echo "<td><a href='update.php?id=".$row['user_id']."'><button class='btn btn-primary'>" . $button_label . "</button></td>";
					echo "<td><a href='deleteuser.php?id=".$row['user_id']."'><button class='btn btn-primary'>Decline</button></td>";
				    echo "</tr>";
					
				  }
				} else {
				  echo "<tr><td colspan='9'>0 results</td></tr>";
				}

				mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
    
    

	
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>