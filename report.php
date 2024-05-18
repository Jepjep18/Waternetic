<?php
include('config.php');
include('session.php');

$result = $conn->query("SELECT * FROM user WHERE id='" . $_SESSION['session_id'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Reporting Form</title>
    <link href="image/finallogo.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
</head>

<body>

<?php include('includes/nav-user.php');?>

    
    
    <div class="container">
        <center>
            <h1>Issue Reporting Form</h1>
        </center>
        <form id="issueForm" method="post" action="submitreport.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['firstname']; ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middleName" name="middleName"
                    value="<?php echo $row['middlename']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName"
                    value="<?php echo $row['lastname']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="block" class="form-label">Block</label>
                <input type="text" class="form-control" id="block" name="block" value="<?php echo $row['block']; ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="lot" class="form-label">Lot</label>
                <input type="text" class="form-control" id="lot" name="lot" value="<?php echo $row['lot']; ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="phase" class="form-label">Phase</label>
                <input type="text" class="form-control" id="phase" name="phase" value="<?php echo $row['phase']; ?>"
                    readonly>
            </div>
            <div class="mb-3">
    <label for="message" class="form-label">Enter Message</label>
    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Type your message here"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<br>
<br>

        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>
