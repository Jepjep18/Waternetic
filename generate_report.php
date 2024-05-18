<?php
    $con = mysqli_connect("localhost","root","","waternetic");
    $sql = "SELECT distinct bill_type FROM payment_services order by bill_type";
    $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
</head>
<body>
    <form class="" action="pdfReport.php" method="post" target="_blank">
        <select class="" name="bill_type"> <!-- Added name attribute -->
        <?php
                while($rows = mysqli_fetch_array($result)) {
                    echo '<option value="'.$rows["bill_type"].'">'.$rows["bill_type"].'</option>'; // Corrected missing closing angle bracket
                }
            ?>
        </select>
        <button type="submit" name="button">Generate Report</button>
    </form>
</body>
</html>
