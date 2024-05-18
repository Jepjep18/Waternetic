<?php
include("config.php");
include("session.php");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$block = $_POST['block'];
$lot = $_POST['lot'];
$phase = $_POST['phase'];
$username = $_POST['username'];
$password = $_POST['password'];
$emailadd = $_POST['emailadd'];
$phonenum = $_POST['phonenum'];
$address = $_POST['address'];
$postalcode = $_POST['postalcode'];
$usertype = $_POST['usertype'];


$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$folder="upload/";
	 
	 // new file size in KB
	 //$new_size = $file_size/1024;  
	 // new file size in KB
	 
	 // make file name in lower case
	$new_file_name = strtolower($file);
	 // make file name in lower case
	 
	$final_file=str_replace(' ','-',$new_file_name);
	 
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{


$sql = "INSERT INTO users(firstname, lastname, block, lot, phase, username, password, emailadd, phonenum, address, postalcode, usertype, photo) 
VALUES('$firstname', '$lastname', '$block', '$lot', '$phase', '$username', '$password',  '$emailadd', '$phonenum', '$address', '$postalcode', '$usertype','$final_file')";
$result = $conn->query($sql);

?>
<script>
	  alert('New user was added');
	        window.location.href='index.php';
	        </script>
		<?php
	}
	else{
		?>
		<script>
	  alert('Error adding user');
	        window.location.href='registration.php';
	        </script>
		<?php
	}
	
?>
		