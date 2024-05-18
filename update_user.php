<?php
	include('config.php');
	include('session.php');

	// Get user ID from the session
	$user_id = $_SESSION['session_id'];

	// Fetch existing user data from the database
	$result = $conn->query("SELECT * FROM user WHERE id='$user_id'");
	$row = mysqli_fetch_array($result);

	if (!empty($row)) {
		// Get updated user information from the form
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		// Add other form fields for the remaining user information

		// Update user information in the database
		$sql = "UPDATE user SET 
				firstname = '$firstname', 
				middlename = '$middlename', 
				lastname = '$lastname' 
				WHERE id = $user_id";

		if ($conn->query($sql) === TRUE) {
			echo "User information updated successfully.";
			// Add a home button
			echo '<br><a href="user.php" class="btn btn-primary">Home</a>';
		} else {
			echo "Error updating user information: " . $conn->error;
		}
	} else {
		echo "User not found.";
	}

	$conn->close();
?>
