<?php
    include('config.php');
    include('session.php');

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $block = $_POST['block'];
    $lot = $_POST['lot'];
    $phase = $_POST['phase'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Plain text password
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
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO user(firstname, middlename, lastname, block, lot, phase, username, password, emailadd, phonenum, address, postalcode, usertype, photo) 
        VALUES('$firstname', '$middlename', '$lastname', '$block', '$lot', '$phase', '$username', '$hashed_password',  '$emailadd', '$phonenum', '$address', '$postalcode', '$usertype','$final_file')";
        $result = $conn->query($query);

        if ($result) {
            // Registration successful message
            echo '<script>alert("Account created successfully!");</script>';
            // Redirect to index.php
            echo '<script>window.location.href="index.php";</script>';
        } else {
            // Error adding user message
            echo '<script>alert("Error adding user");</script>';
            // Redirect to admin-users_admin.php
            echo '<script>window.location.href="admin-users_admin.php";</script>';
        }
    }
    else{
        // Error uploading file message
        echo '<script>alert("Error uploading file");</script>';
        // Redirect to admin-users_admin.php
        echo '<script>window.location.href="admin-users_admin.php";</script>';
    }
?>
