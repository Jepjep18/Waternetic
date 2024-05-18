<?php
// Include necessary files
include('config.php');
include('session.php');

// Retrieve form data
$firstname = $_POST['first_name'];
$middlename = $_POST['middle_name'];
$lastname = $_POST['last_name'];
$block = $_POST['block'];
$lot = $_POST['lot'];
$phase = $_POST['phase'];

// Check if file was uploaded
if(isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
    // Generate unique filename
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="uploads/";
     
    // Make file name in lower case
    $new_file_name = strtolower($file);
     
    // Replace spaces in filename with hyphens
    $final_file=str_replace(' ','-',$new_file_name);
     
    // Move uploaded file to server
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        // Insert data into database
        $query = "INSERT INTO water_application(first_name, middle_name, last_name, block, lot, phase, file_path) 
        VALUES('$firstname', '$middlename', '$lastname', '$block' , '$lot', '$phase','$final_file')";
        $result = $conn->query($query);

        // Redirect to index page with success message
        ?>
        <script>
            alert('New user was added');
            window.location.href='index.php';
        </script>
        <?php
    }
    else{
        // Redirect to error page
        ?>
        <script>
            alert('Error adding user');
            window.location.href='#';
        </script>
        <?php
    }
}
else {
    // File was not uploaded
    // Insert data into database without file path
    $query = "INSERT INTO water_application(first_name, middle_name, last_name, block, lot, phase) 
    VALUES('$firstname', '$middlename', '$lastname', '$block' , '$lot', '$phase')";
    $result = $conn->query($query);

    // Redirect to index page with success message
    ?>
    <script>
        alert('New user was added');
        window.location.href='index.php';
    </script>
    <?php
}
?>
