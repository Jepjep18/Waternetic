<?php
include('config.php');
include('session.php');

$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
$row = mysqli_fetch_array($result);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Water Application Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" integrity="sha512-PKvklTPzkmOML34lMVVAbCn0YQyKq3i78JtKDrPnpn/Qa2InBL/k3cNN1K/M5H0b5DdX0pyhnLSROfH7Lulbfw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>Water Application Form</h1>
        <form action="submit.php" method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['firstname'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php $row['middlename'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['lastname'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="block" class="form-label">Block</label>
                <input type="text" class="form-control" id="block" name="block" required>
            </div>
            <div class="mb-3">
                <label for="lot" class="form-label">Lot</label>
                <input type="text" class="form-control" id="lot" name="lot" required>
            </div>
            <div class="mb-3">
                <label for="phase" class="form-label">Phase</label>
                <input type="text" class="form-control" id="phase" name="phase" required>
            </div>
            <div class="mb-3">
        <label for="inputFile" class="form-label">File input</label>
        <input type="file" name="file" class="form-control" id="inputFile">
        <p class="help-block">Land Title / Valid IDs</p>
      </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js" integrity="sha512-M7jBfRpxIsuV7OslOvND1V7h4YZYwMqN3cSvCqxjKzPPyTxxfif9Q0KjPLxkGjODdDpj/xm0MNljSwvD0sIDgQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
